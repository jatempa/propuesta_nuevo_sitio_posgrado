<?php

namespace DEPI\ProyectosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\ProyectosBundle\Entity\Proyectos;
use DEPI\ProyectosBundle\Form\ProyectosType;

/**
 * Proyectos controller.
 *
 * @Route("/proyectos")
 */
class ProyectosController extends Controller
{

    /**
     * Lists all Proyectos entities.
     *
     * @Route("/", name="proyectos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProyectosBundle:Proyectos')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new Proyectos entity.
     *
     * @Route("/", name="proyectos_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Proyectos();
        $form = $this->createForm(new ProyectosType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('proyectos'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Edits an existing Proyectos entity.
     *
     * @Route("/{id}", name="proyectos_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectosBundle:Proyectos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyectos entity.');
        }

        $form = $this->createForm(new ProyectosType(), $entity, array(
            'action' => $this->generateUrl('proyectos_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('proyectos'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectosBundle:Proyectos')->deleteProyectos($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyectos entity.');
        }

        return $this->redirect($this->generateUrl('proyectos'));
    }
}
