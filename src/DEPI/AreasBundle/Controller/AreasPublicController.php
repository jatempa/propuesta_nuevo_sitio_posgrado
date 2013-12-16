<?php

namespace DEPI\AreasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\AreasBundle\Entity\Areas;

/**
 * AreasPublic controller.
 *
 * @Route("/areas_public")
 */
class AreasPublicController extends Controller
{

    /**
     * Lists all Areas entities.
     *
     * @Route("/", name="areas_public")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AreasBundle:Areas')->findAll();
        $banner = $em->getRepository('PortadaBundle:Portada')->findImagenesBanner();

        return $this->render('AreasBundle:Areas:index_public.html.twig', array('entities' => $entities, 'banner' => $banner));
    }

    public function infoAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $informacion = $em->getRepository('AreasBundle:Areas')->findInformacionArea($id);
        $banner = $em->getRepository('PortadaBundle:Portada')->findImagenesBanner();

        return $this->render('AreasBundle:Areas:areas_info.html.twig', array('informacion' => $informacion, 'banner' => $banner));
    }
}
