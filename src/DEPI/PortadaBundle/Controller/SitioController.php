<?php

namespace DEPI\PortadaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SitioController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('NoticiasBundle:Noticias')->findAll();

        return $this->render('PortadaBundle:Portada:index.html.twig',  array('entities' => $entities));
    }

	public function directorioAction()
    {
        return $this->render('PortadaBundle:Portada:directorio.html.twig');
    }

}
