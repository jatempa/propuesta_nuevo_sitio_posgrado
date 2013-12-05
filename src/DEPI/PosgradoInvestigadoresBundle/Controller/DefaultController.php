<?php

namespace DEPI\PosgradoInvestigadoresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PosgradoInvestigadoresBundle:Default:index.html.twig', array('name' => $name));
    }
}
