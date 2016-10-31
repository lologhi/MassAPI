<?php

namespace MassAPIBundle\MesseInfoParser;

use Doctrine\ORM\EntityManager;
use MassAPIBundle\Entity\GeoCoordinates;
use MassAPIBundle\Entity\ImageObject;
use MassAPIBundle\Entity\Place;
use MassAPIBundle\Entity\PostalAddress;
use Monolog\Logger;

class PlaceParser
{
    private $em;
    private $placeRepository;
    private $logger;

    const RESULT_LIST = 'O';
    const RESULT_NODE = 'P';

    public function __construct(EntityManager $entityManager, Logger $logger)
    {
        $this->em = $entityManager;
        $this->placeRepository = $entityManager->getRepository('MassAPIBundle:Place');
        $this->logger = $logger;
    }

    public function parse($response)
    {
        if (! is_array($response)||! array_key_exists(self::RESULT_LIST, $response)) {
            $this->logger->debug('No result list for this request.');
            return 0;
        }

        foreach ($response['O'] as $result) {
            if (! is_array($result)||! array_key_exists(self::RESULT_NODE, $result)) {
                $this->logger->debug('No result node for this request.');
                return 0;
            }
            if (isset($result['P']['name'])) {
                $place = $this->placeRepository->findOneBy(array('globalLocationNumber' => $result['P']['id']));
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

                    $this->em->persist($place);
                    $this->logger->info('Added: ' . $result['P']['name']);
                } else {
                    $this->logger->info('Existing: ' . $result['P']['name']);
                }
            }
        }
        $this->em->flush();
    }
}
