<?php

namespace DEPI\ProyectosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProyectosBundle:Default:index.html.twig', array('name' => $name));
    }
}
