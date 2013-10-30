<?php

namespace DEPI\ProductosAcademicosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProductosAcademicosBundle:Default:index.html.twig', array('name' => $name));
    }
}
