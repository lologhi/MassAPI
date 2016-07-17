<?php

namespace MassAPIBundle\Command;

use Doctrine\ORM\EntityManagerInterface;
use MassAPIBundle\Entity\Event;
use MassAPIBundle\Entity\GeoCoordinates;
use MassAPIBundle\Entity\ImageObject;
use MassAPIBundle\Entity\Place;
use MassAPIBundle\Entity\PostalAddress;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MesseInfoParserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('massapi:parse')
            ->setDescription('Parse MesseInfo website')
            ->addArgument(
                'nbResults',
                InputArgument::REQUIRED,
                'How many results to bring ?'
            )
            ->addArgument(
                'zipCode',
                InputArgument::REQUIRED,
                'Quel département'
            )
            ->addArgument(
                'city',
                InputArgument::REQUIRED,
                'What city?'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var EntityManagerInterface $em */
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $nbResults = $input->getArgument('nbResults');
        $zipCode = $input->getArgument('zipCode');
        $city = $input->getArgument('city');
        $jsonResponse = exec('curl \'http://egliseinfo.catholique.fr/gwtRequest\' -H \'Content-Type: application/json; charset=UTF-8\' --data-binary \'{"F":"cef.kephas.shared.request.AppRequestFactory","I":[{"O":"Bzv0wi60qgwcW5aKiRKrtgNaLKo=","P":[".fr '.$zipCode.' '.$city.'",0,'.$nbResults.',0,null,"",""],"R":["listCelebrationTime.locality"]}]}\'');
        $response = json_decode($jsonResponse, true);

        // Get church
        $placeRepository = $em->getRepository('MassAPIBundle:Place');
        foreach ($response['O'] as $result) {
            if (isset($result['P']['name'])) {
                $place = $placeRepository->findOneBy(array('globalLocationNumber' => $result['P']['id']));
                if (! $place instanceof Place) {
                    $address = new PostalAddress();
                    $address->setStreetAddress($result['P']['address']);
                    $address->setPostalCode($result['P']['zipcode']);
                    $address->setAddressRegion(substr($result['P']['zipcode'], 0, 2));
                    $address->setAddressLocality(ucwords(strtolower($result['P']['city'])));

                    $geo = new GeoCoordinates();
                    $geo->setLatitude($result['P']['latitude']);
                    $geo->setLongitude($result['P']['longitude']);
                    $geo->setGeoPoint('{ "type": "Point", "coordinates": ['.$result['P']['longitude'].', '.$result['P']['latitude'].'] }');

                    $photo = new ImageObject();
                    $photo->setCaption($result['P']['picture']);

                    $place = new Place();
                    $place->setGlobalLocationNumber($result['P']['id']);
                    $place->setName($result['P']['name']);
                    $place->setAddress($address);
                    $place->setGeo($geo);
                    $place->setPhoto();

                    $em->persist($place);
                    $output->writeln('Added: ' . $result['P']['name']);
                } else {
                    $output->writeln('Existing: ' . $result['P']['name']);
                }
            }
        }

        $em->flush();

        // Get mass
        $eventRepository = $em->getRepository('MassAPIBundle:Event');
        foreach ($response['O'] as $result) {
            if (isset($result['P']['time'])) {
                $datetime = new \DateTime();
                $doorTime = $datetime->createFromFormat('Y-m-d H\hi', $result['P']['date'] . ' ' . $result['P']['time']);
                $startDate = $datetime->createFromFormat('Y-m-d', $result['P']['date']);

                $event = $eventRepository->findOneBy(array(
                    'description'   => $result['P']['id'],
                    'duration'      => $result['P']['length'],
                    'doorTime'      => $doorTime,
                    'startDate'     => $startDate
                ));
                $place = $placeRepository->findOneBy(array('globalLocationNumber' => $result['P']['localityId']));

                if (! $event instanceof Event) {
                    $event = new Event();
                    $event->setDoorTime($doorTime);
                    $event->setDuration($result['P']['length']);
                    $event->setDescription($result['P']['id']);
                    $event->setStartDate($startDate);

                    $em->persist($event);
                    $output->writeln('Added: ' . $result['P']['date'] . ' @ ' . $result['P']['time']);
                }

                if ($place instanceof Place) {
                    $event->setLocation($place);
                    $output->writeln('Linked ' . $result['P']['date'] . ' @ ' . $result['P']['time'] . ' to ' . $place->getName());
                }
            }
        }

        $em->flush();

        return 0;
    }
}
