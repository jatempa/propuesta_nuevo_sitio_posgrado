<?php

namespace DEPI\AreasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AreasPublicController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AreasBundle:Areas')->findAll();
        $banner = $em->getRepository('PortadaBundle:Portada')->findImagenesBanner();

        $respuesta = $this->render(
            'AreasBundle:Areas:index_public.html.twig', 
            array('entities' => $entities, 'banner' => $banner)
        );

        $respuesta->setMaxAge(5 * 60);

        return $respuesta;
    }
}
