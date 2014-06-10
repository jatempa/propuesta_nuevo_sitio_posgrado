<?php

namespace DEPI\InvestigadoresProyectosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\InvestigadoresProyectosBundle\Entity\InvestigadoresProyectos;
use DEPI\InvestigadoresProyectosBundle\Form\InvestigadoresProyectosType;

/**
 * InvestigadoresProyectos controller.
 *
 * @Route("/investigadoresproyectos")
 */
class InvestigadoresProyectosController extends Controller
{

    /**
     * Lists all InvestigadoresProyectos entities.
     *
     * @Route("/", name="investigadoresproyectos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InvestigadoresProyectosBundle:InvestigadoresProyectos')->findInvestigadoresProyectos();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        $respuesta = $this->render('InvestigadoresProyectosBundle:InvestigadoresProyectos:index.html.twig',
            array('entities' => $pagination)
        );
        $respuesta->setMaxAge(15 * 60);

        return $respuesta;
    }
    /**
     * Creates a new InvestigadoresProyectos entity.
     *
     * @Route("/", name="investigadoresproyectos_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new InvestigadoresProyectos();
        $form = $this->createForm(new InvestigadoresProyectosType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('investigadoresproyectos'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Edits an existing InvestigadoresProyectos entity.
     *
     * @Route("/{id}", name="investigadoresproyectos_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadoresProyectosBundle:InvestigadoresProyectos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InvestigadoresProyectos entity.');
        }

        $form = $this->createForm(new InvestigadoresProyectosType(), $entity, array(
            'action' => $this->generateUrl('investigadoresproyectos_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('investigadoresproyectos'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadoresProyectosBundle:InvestigadoresProyectos')->deleteInvestigadoresProyectos($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InvestigadoresProyectos entity.');
        }

        return $this->redirect($this->generateUrl('investigadoresproyectos'));
    }
}
