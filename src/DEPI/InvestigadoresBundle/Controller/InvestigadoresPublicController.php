<?php

namespace DEPI\InvestigadoresBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\InvestigadoresBundle\Entity\Investigadores;
use DEPI\InvestigadoresBundle\Form\InvestigadoresType;

/**
 * Investigadores controller.
 *
 * @Route("/investigadores_public")
 */
class InvestigadoresPublicController extends Controller
{
    /**
     * Lists all Investigadores entities.
     *
     * @Route("/", name="investigadores")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InvestigadoresBundle:Investigadores')->findAll();
        $banner = $em->getRepository('PortadaBundle:Portada')->findImagenesBanner();
        $entitiesProyectos = $em->getRepository('InvestigadorProyectoBundle:InvestigadorProyecto')->findInvestigadorProyecto();
        $entitiesLineas = $em->getRepository('InvestigadoresLineasBundle:InvestigadoresLineas')->findInvestigadoresLineas();
        return $this->render('InvestigadoresBundle:Investigadores:index_public.html.twig', array('entities' => $entities,'entities2' => $entitiesProyectos,'entitiesLineas' => $entitiesLineas, 'banner' => $banner));
    }

    // /**
    //  * Lists all Investigadores entities.
    //  *
    //  * @Route("/", name="investigadores")
    //  * @Method("GET")
    //  * @Template()
    //  */
    // public function indexAction()
    // {
    //     $em = $this->getDoctrine()->getManager();

    //     $entities = $em->getRepository('InvestigadoresLineasBundle:InvestigadoresLineas')->findInvestigadoresLineas();

    //     return $this->render('InvestigadoresBundle:Investigadores:index_public.html.twig', array('entities' => $entities));
    // }

    /**
     * Finds and displays a Investigadores entity.
     *
     * @Route("/{id}", name="investigadores_show_public")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadoresBundle:Investigadores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Investigadores entity.');
        }

        return $this->render('InvestigadoresBundle:Investigadores:show_public.html.twig', array('entity' => $entity));
    }
}
