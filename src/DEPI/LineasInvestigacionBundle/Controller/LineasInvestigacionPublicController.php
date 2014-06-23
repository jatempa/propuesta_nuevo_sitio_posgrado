<?php

namespace DEPI\LineasInvestigacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LineasInvestigacionPublicController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LineasInvestigacionBundle:LineasInvestigacion')->findAll();
        $banner = $em->getRepository('PortadaBundle:Portada')->findImagenesBanner();

        $respuesta = $this->render(
            'LineasInvestigacionBundle:LineasInvestigacion:index_public.html.twig', 
            array('entities' => $entities, 'banner' => $banner)
        );

        $respuesta->setMaxAge(5 * 60);

        return $respuesta;
    }
}
