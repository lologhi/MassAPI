<?php

namespace MassAPIBundle\Command;


use Doctrine\ORM\EntityManagerInterface;
use Guzzle\Http\Client;
use KageNoNeko\OSM\BoundingBox;
use KageNoNeko\OSM\OverpassConnection;
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
        $client = $this->getContainer()->get('csa_guzzle.client.osm_api');

        foreach ($places as $place) {
            $results = $this->queryNode($place->getGeo()->getLatitude(),$place->getGeo()->getLongitude());
            if (! empty($results['elements'])) {
                foreach ($results['elements'] as $result) {
                    dump($result);
                    if (array_key_exists('tags', $result) && array_key_exists('name', $result['tags'])) {
                        $place->setName($result['tags']['name']);
                    }
                    if (array_key_exists('lat', $result) && array_key_exists('lon', $result)) {
                        $place->getGeo()->setLatitude($result['lat']);
                        $place->getGeo()->setLongitude($result['lon']);
                    }
                }
            }

            $results = $this->queryWay($place->getGeo()->getLatitude(),$place->getGeo()->getLongitude());
            if (! empty($results['elements'])) {
                foreach ($results['elements'] as $result) {
                    dump($result);
                    if (array_key_exists('tags', $result) && array_key_exists('name', $result['tags'])) {
                        $place->setName($result['tags']['name']);
                    }
                    if (array_key_exists('nodes', $result) && !empty($result['nodes'])) {
                        $result = $client->get('node/' . $result['nodes'][0]);
                        $node = simplexml_load_string($result->getBody()->getContents());
                        $attributes = $node->node[0]->attributes();
                        if (array_key_exists('lat', $attributes) && array_key_exists('lon', $attributes)) {
                            $place->getGeo()->setLatitude($attributes['lat']);
                            $place->getGeo()->setLongitude($attributes['lon']);
                        }
                    }
                }
            }
        }
    }

    private function queryNode($latitude, $longitude)
    {
        return $this->query($latitude, $longitude, 'node');
    }

    private function queryWay($latitude, $longitude)
    {
        return $this->query($latitude, $longitude, 'way');
    }

    private function query($latitude, $longitude, $type)
    {
        $variation = 0.03;
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
