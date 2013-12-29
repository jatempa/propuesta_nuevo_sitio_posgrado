<?php

namespace DEPI\AreasProyectosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
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
     * Displays a form to edit an existing AreasProyectos entity.
     *
     * @Route("/{id}/edit", name="areasproyectos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AreasProyectosBundle:AreasProyectos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AreasProyectos entity.');
        }

        $editForm = $this->createEditForm($entity);
     
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a AreasProyectos entity.
    *
    * @param AreasProyectos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AreasProyectos $entity)
    {
        $form = $this->createForm(new AreasProyectosType(), $entity, array(
            'action' => $this->generateUrl('areasproyectos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing AreasProyectos entity.
     *
     * @Route("/{id}", name="areasproyectos_update")
     * @Method("PUT")
     * @Template("AreasProyectosBundle:AreasProyectos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AreasProyectosBundle:AreasProyectos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AreasProyectos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('areasproyectos'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
}
