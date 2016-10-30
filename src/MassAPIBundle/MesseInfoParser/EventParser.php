<?php

namespace MassAPIBundle\MesseInfoParser;


use Doctrine\ORM\EntityManager;
use MassAPIBundle\Entity\Event;
use MassAPIBundle\Entity\Place;
use Monolog\Logger;

class EventParser
{
    private $em;
    private $eventRepository;
    private $logger;

    const RESULT_LIST = 'O';
    const RESULT_NODE = 'P';

    public function __construct(EntityManager $entityManager, Logger $logger)
    {
        $this->em = $entityManager;
        $this->placeRepository = $entityManager->getRepository('MassAPIBundle:Place');
        $this->eventRepository = $entityManager->getRepository('MassAPIBundle:Event');
        $this->logger = $logger;
    }

    public function parse($response)
    {
        if (! array_key_exists(self::RESULT_LIST, $response)) {
            $this->logger->debug('No result list for this request.');
            return 0;
        }

        foreach ($response[self::RESULT_LIST] as $result) {
            if (! array_key_exists(self::RESULT_NODE, $result)) {
                $this->logger->debug('No result node for this request.');
                return 0;
            }
            if (isset($result[self::RESULT_NODE]['time'])) {
                $datetime = new \DateTime();
                $doorTime = $datetime->createFromFormat('Y-m-d H\hi', $result['P']['date'] . ' ' . $result['P']['time']);
                $startDate = $datetime->createFromFormat('Y-m-d', $result['P']['date']);

                $event = $this->eventRepository->findOneBy(array(
                    'description'   => $result['P']['id'],
                    'duration'      => $result['P']['length'],
                    'doorTime'      => $doorTime,
                    'startDate'     => $startDate
                ));
                $place = $this->placeRepository->findOneBy(array('globalLocationNumber' => $result['P']['localityId']));

                if (! $event instanceof Event) {
                    $event = new Event();
                    $event->setDoorTime($doorTime);
                    $event->setDuration($result['P']['length']);
                    $event->setDescription($result['P']['id']);
                    $event->setStartDate($startDate);

                    $this->em->persist($event);
                    $this->logger->info('Added: ' . $result['P']['date'] . ' @ ' . $result['P']['time']);
                }

                if ($place instanceof Place) {
                    $event->setLocation($place);
                    $this->logger->info('Linked ' . $result['P']['date'] . ' @ ' . $result['P']['time'] . ' to ' . $place->getName());
                }
            }
        }
        $this->em->flush();
    }
}
