<?php

namespace DEPI\PortadaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SitioController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();

        $noticias = $em->getRepository('NoticiasBundle:Noticias')->findNoticias();
        $banner = $em->getRepository('PortadaBundle:Portada')->findImagenesBanner();

        $respuesta = $this->render('PortadaBundle:Portada:sitio.html.twig', 
            array('noticias' => $noticias, 'banner' => $banner)
        );

        $respuesta->setMaxAge(15 * 60);

        return $respuesta;
    }

	public function directorioAction()
    {
        $em = $this->getDoctrine()->getManager();

        $banner = $em->getRepository('PortadaBundle:Portada')->findImagenesBanner();

        $respuesta = $this->render('PortadaBundle:Portada:directorio.html.twig', 
            array('banner' => $banner)
        );
        
        $respuesta->setMaxAge(15 * 60);

        return $respuesta;
    }

}
