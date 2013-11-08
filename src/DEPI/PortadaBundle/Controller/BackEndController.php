<?php

namespace DEPI\PortadaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BackEndController extends Controller
{
    public function indexAction()
    {
        return $this->render('PortadaBundle:BackEnd:index.html.twig');
    }
}
