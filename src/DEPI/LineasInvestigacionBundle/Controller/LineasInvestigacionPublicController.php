<?php

namespace DEPI\LineasInvestigacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\LineasInvestigacionBundle\Entity\LineasInvestigacion;

/**
 * LineasInvestigacionPublic controller.
 *
 * @Route("/lineas_public")
 */
class LineasInvestigacionPublicController extends Controller
{

    /**
     * Lists all LineasInvestigacion entities.
     *
     * @Route("/", name="lineas_public")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LineasInvestigacionBundle:LineasInvestigacion')->findAll();
        $banner = $em->getRepository('PortadaBundle:Portada')->findImagenesBanner();

        return $this->render('LineasInvestigacionBundle:LineasInvestigacion:index_public.html.twig', array('entities' => $entities, 'banner' => $banner));
    }
}
