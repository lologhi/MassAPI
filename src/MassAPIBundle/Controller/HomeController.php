<?php

namespace MassAPIBundle\Controller;

use MassAPIBundle\Entity\Event;
use MassAPIBundle\Entity\Place;
use MassAPIBundle\Form\Type\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function indexAction(Request $request)
    {
        $searchForm = $this->createForm(new SearchType());

        if ($request->isMethod('POST') && $searchForm->handleRequest($request)->isValid()) {
            return $this->redirect($this->generateUrl('map', array(
                'postalCode' => $searchForm->getData()->getPostalCode()
            )));
        }

        return $this->render('MassAPIBundle:Home:index.html.twig', array(
            'searchForm' => $searchForm->createView(),
        ));
    }

    public function mapAction($postalCode = null)
    {
        return $this->render('MassAPIBundle:Home:map.html.twig', array(
            'postalCode' => $postalCode,
        ));
    }

    public function nearPlaceAction(Request $request)
    {
        $lat1 = (float) $request->get('lat1');
        $lat2 = (float) $request->get('lat2');
        $lng1 = (float) $request->get('lng1');
        $lng2 = (float) $request->get('lng2');

        if (!$lat1 || !$lat2 || !$lng1 || !$lng2 ||$lat1 === $lat2 || $lng1 === $lng2) {
            return new JsonResponse();
        }

        $places = $this->get('massapi.repository.place')->getNearPlace(array(
            'inside_json' => json_encode(array(
                'type'        => 'Polygon',
                'coordinates' => array(array(
                    array($lng1, $lat1),
                    array($lng1, $lat2),
                    array($lng2, $lat2),
                    array($lng2, $lat1),
                    array($lng1, $lat1),
                )),
            ))
        ));

        $cleanPlaces = array();
        /** @var Place $place */
        foreach ($places as $place) {
            $upcomingEvents = '<ul>';
            /** @var Event $event */
            foreach ($place->getEvent() as $event) {
                $upcomingEvents .= '<li>' . $event->getDoorTime()->format('H:i:s \à d/m/Y') . '</li>';
            }
            $upcomingEvents .= '</ul>';

            $cleanPlaces[] = array(
                'type'      => 'Feature',
                'properties'=> array(
                    'title'     => $place->getName(),
                    'icon'      => 'star',
                    'events'    => $upcomingEvents
                ),
                'geometry'  => array(
                    'type'          => 'Point',
                    'coordinates'   => array($place->getGeo()->getLongitude(), $place->getGeo()->getLatitude())
                )
            );

        }

        return new JsonResponse(array(
            'type'     => 'FeatureCollection',
            'features' => $cleanPlaces,
        ));
    }
}
