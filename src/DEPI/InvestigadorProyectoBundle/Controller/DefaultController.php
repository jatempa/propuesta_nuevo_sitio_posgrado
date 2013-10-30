<?php

namespace DEPI\InvestigadorProyectoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('InvestigadorProyectoBundle:Default:index.html.twig', array('name' => $name));
    }
}
