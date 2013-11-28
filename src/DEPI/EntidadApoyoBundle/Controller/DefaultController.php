<?php

namespace DEPI\EntidadApoyoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EntidadApoyoBundle:Default:index.html.twig', array('name' => $name));
    }
}
