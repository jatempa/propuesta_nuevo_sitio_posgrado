<?php

namespace DEPI\InvestigadoresLineasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('InvestigadoresLineasBundle:Default:index.html.twig', array('name' => $name));
    }
}
