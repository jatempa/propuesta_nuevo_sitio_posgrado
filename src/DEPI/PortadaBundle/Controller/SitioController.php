<?php

namespace DEPI\PortadaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SitioController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();

        $noticias = $em->getRepository('NoticiasBundle:Noticias')->findNoticias();
        $banner = $em->getRepository('PortadaBundle:Portada')->findImagenesBanner();

        return $this->render('PortadaBundle:Portada:sitio.html.twig',  array('noticias' => $noticias, 'banner' => $banner));
    }

	public function directorioAction()
    {
        return $this->render('PortadaBundle:Portada:directorio.html.twig');
    }

}
