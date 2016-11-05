<?php

namespace MassAPIBundle\Command;


use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Client;
use KageNoNeko\OSM\BoundingBox;
use KageNoNeko\OSM\OverpassConnection;
use MassAPIBundle\Entity\Place;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OpenStreetMapQueryCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('osm:query')
            ->setDescription('Query OSM to get information about churches')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var EntityManagerInterface $em */
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $places = $em->getRepository('MassAPIBundle:Place')->findBy(array('name' => 'Eglise'));

        /** @var Client $client */
        $guzzleClient = $this->getContainer()->get('csa_guzzle.client.osm_api');

        foreach ($places as $place) {
            $data = array();
            $variation = 0.00;

            while (empty($data)) {
                $variation += 0.01;
                $output->writeln('Looking for unnamed church in '.$place->getAddress()->getAddressLocality() . ' ('.$variation.')');

                $results = $this->queryNode($place, $variation);
                $data = $this->processResult($results, $guzzleClient);

                if (empty($data)) {
                    $results = $this->queryWay($place, $variation);
                    $data = $this->processResult($results, $guzzleClient);
                }
            }


            if (array_key_exists('name', $data)) {
                $output->writeln('Church found: '.$data['name'].' ('.$variation.')');
            } else {
                $output->writeln('Found one, unnamed in OSM :\'(');
            }

            /*$place->setName($data['name']);
            $place->getGeo()->setLatitude($data['lat']);
            $place->getGeo()->setLongitude($data['lon']);*/
        }
    }

    private function processResult($results, Client $guzzleClient)
    {
        $data = array();

        if (empty($results['elements'])) {
            return $data;
        }

        foreach ($results['elements'] as $result) {
            if (array_key_exists('tags', $result) && array_key_exists('name', $result['tags'])) {
                $data['name'] = $result['tags']['name'];
            }
            if (array_key_exists('lat', $result) && array_key_exists('lon', $result)) {
                $data['lat'] = $result['lat'];
                $data['lon'] = $result['lon'];
            }
            if (array_key_exists('type', $result) && 'way' === $result['type']) {
                // Query OSM API node
                $result = $guzzleClient->get('node/' . $result['nodes'][0]);
                $node = simplexml_load_string($result->getBody()->getContents());
                $attributes = $node->node[0]->attributes();
                if ($attributes->lat && $attributes->lon) {
                    $data['lat'] = $attributes['lat'];
                    $data['lon'] = $attributes['lon'];
                }
            }
        }

        return $data;
    }

    private function queryNode(Place $place, $variation)
    {
        return $this->query($place->getGeo()->getLatitude(), $place->getGeo()->getLongitude(), 'node', $variation);
    }

    private function queryWay(Place $place, $variation)
    {
        return $this->query($place->getGeo()->getLatitude(), $place->getGeo()->getLongitude(), 'way', $variation);
    }

    private function query($latitude, $longitude, $type, $variation)
    {
        $lowerLatitude   = $latitude - $variation;
        $higherLatitude  = $latitude + $variation;
        $lowerLongitude  = $longitude - $variation;
        $higherLongitude = $longitude + $variation;
        $bBox = new BoundingBox($lowerLatitude, $lowerLongitude, $higherLatitude, $higherLongitude);

        $osm = new OverpassConnection(['interpreter' => 'http://overpass-api.de/api/interpreter']);

        $q = $osm->element($type)
            ->whereTag('amenity', 'place_of_worship')
            //->whereTag('religion', 'christian')
            ->verbosity('meta')
            ->asJson();
        $response = $q->whereInBBox($bBox)->get();

        return json_decode($response->getBody()->getContents(), true);
    }
}
