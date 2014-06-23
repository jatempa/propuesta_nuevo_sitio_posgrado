<?php

namespace DEPI\InvestigadoresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class InvestigadoresPublicController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InvestigadoresBundle:Investigadores')->findAll();
        $banner = $em->getRepository('PortadaBundle:Portada')->findImagenesBanner();
        $entitiesProyectos = $em->getRepository('InvestigadorProyectoBundle:InvestigadorProyecto')->findInvestigadorProyecto();
        $entitiesLineas = $em->getRepository('InvestigadoresLineasBundle:InvestigadoresLineas')->findInvestigadoresLineas();
        
        $respuesta = $this->render(
            'InvestigadoresBundle:Investigadores:index_public.html.twig', 
            array('entities' => $entities,'entities2' => $entitiesProyectos,'entitiesLineas' => $entitiesLineas, 'banner' => $banner)
        );

        $respuesta->setMaxAge(5 * 60);

        return $respuesta;
    }
}
