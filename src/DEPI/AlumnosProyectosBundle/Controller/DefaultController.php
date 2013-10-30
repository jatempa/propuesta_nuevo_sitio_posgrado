<?php

namespace DEPI\AlumnosProyectosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AlumnosProyectosBundle:Default:index.html.twig', array('name' => $name));
    }
}
