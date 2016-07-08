<?php

namespace MassAPIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MassAPIBundle:Default:index.html.twig');
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

        return new JsonResponse(array(
            'type'     => 'FeatureCollection',
            'features' => $places,
        ));
    }
}
