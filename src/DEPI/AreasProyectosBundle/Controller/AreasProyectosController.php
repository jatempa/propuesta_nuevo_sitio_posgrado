<?php

namespace DEPI\AreasProyectosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\AreasProyectosBundle\Entity\AreasProyectos;
use DEPI\AreasProyectosBundle\Form\AreasProyectosType;

/**
 * AreasProyectos controller.
 *
 * @Route("/areasproyectos")
 */
class AreasProyectosController extends Controller
{

    /**
     * Lists all AreasProyectos entities.
     *
     * @Route("/", name="areasproyectos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AreasProyectosBundle:AreasProyectos')->findAreasProyectos();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new AreasProyectos entity.
     *
     * @Route("/", name="areasproyectos_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AreasProyectos();
        $form = $this->createForm(new AreasProyectosType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('areasproyectos'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Edits an existing AreasProyectos entity.
     *
     * @Route("/{id}", name="areasproyectos_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AreasProyectosBundle:AreasProyectos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AreasProyectos entity.');
        }

        $form = $this->createForm(new AreasProyectosType(), $entity, array(
            'action' => $this->generateUrl('areasproyectos_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('areasproyectos'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AreasProyectosBundle:AreasProyectos')->deleteAreasProyectos($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AreasProyectos entity.');
        }

        return $this->redirect($this->generateUrl('areasproyectos'));
    }
}
