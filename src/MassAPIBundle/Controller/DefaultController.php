<?php

namespace MassAPIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MassAPIBundle:Default:index.html.twig', array('name' => $name));
    }
}
