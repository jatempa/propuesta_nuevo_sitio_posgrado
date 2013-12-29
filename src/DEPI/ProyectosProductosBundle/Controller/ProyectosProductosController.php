<?php

namespace DEPI\ProyectosProductosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\ProyectosProductosBundle\Entity\ProyectosProductos;
use DEPI\ProyectosProductosBundle\Form\ProyectosProductosType;

/**
 * ProyectosProductos controller.
 *
 * @Route("/proyectosproductos")
 */
class ProyectosProductosController extends Controller
{

    /**
     * Lists all ProyectosProductos entities.
     *
     * @Route("/", name="proyectosproductos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProyectosProductosBundle:ProyectosProductos')->findProyectosProductos();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new ProyectosProductos entity.
     *
     * @Route("/", name="proyectosproductos_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ProyectosProductos();
        $form = $this->createForm(new ProyectosProductosType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('proyectosproductos'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Displays a form to edit an existing ProyectosProductos entity.
     *
     * @Route("/{id}/edit", name="proyectosproductos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectosProductosBundle:ProyectosProductos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProyectosProductos entity.');
        }

        $editForm = $this->createEditForm($entity);
     
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a ProyectosProductos entity.
    *
    * @param ProyectosProductos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ProyectosProductos $entity)
    {
        $form = $this->createForm(new ProyectosProductosType(), $entity, array(
            'action' => $this->generateUrl('proyectosproductos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing ProyectosProductos entity.
     *
     * @Route("/{id}", name="proyectosproductos_update")
     * @Method("PUT")
     * @Template("ProyectosProductosBundle:ProyectosProductos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectosProductosBundle:ProyectosProductos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProyectosProductos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('proyectosproductos'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
}
