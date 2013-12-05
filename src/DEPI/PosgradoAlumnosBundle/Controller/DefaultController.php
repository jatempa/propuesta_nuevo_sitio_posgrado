<?php

namespace DEPI\PosgradoAlumnosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PosgradoAlumnosBundle:Default:index.html.twig', array('name' => $name));
    }
}
