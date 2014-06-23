<?php

namespace DEPI\InvestigadoresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class InvestigadoresPublicController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InvestigadoresBundle:Investigadores')->findInvestigadores();
        $entitiesProyectos = $em->getRepository('InvestigadoresProyectosBundle:InvestigadoresProyectos')->findInvestigadoresProyectos();
        $entitiesLineas = $em->getRepository('InvestigadoresLineasBundle:InvestigadoresLineas')->findInvestigadoresLineas();
        $banner = $em->getRepository('PortadaBundle:Portada')->findImagenesBanner();
        
        $respuesta = $this->render(
            'InvestigadoresBundle:Investigadores:index_public.html.twig', 
            array('entities' => $entities,'entities2' => $entitiesProyectos,'entitiesLineas' => $entitiesLineas, 'banner' => $banner)
        );

        $respuesta->setMaxAge(5 * 60);

        return $respuesta;
    }
}
