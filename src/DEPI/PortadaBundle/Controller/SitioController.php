<?php

namespace DEPI\PortadaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SitioController extends Controller
{
    public function indexAction()
    {
        return $this->render('PortadaBundle:Portada:index.html.twig');
    }
}
