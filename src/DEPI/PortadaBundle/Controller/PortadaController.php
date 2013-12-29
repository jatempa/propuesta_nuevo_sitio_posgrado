<?php

namespace DEPI\PortadaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\PortadaBundle\Entity\Portada;
use DEPI\PortadaBundle\Form\PortadaType;

/**
 * Portada controller.
 *
 * @Route("/portada")
 */
class PortadaController extends Controller
{

    /**
     * Lists all Portada entities.
     *
     * @Route("/", name="portada")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PortadaBundle:Portada')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new Portada entity.
     *
     * @Route("/", name="portada_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Portada();
        $form = $this->createForm(new PortadaType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('portada'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Displays a form to edit an existing Portada entity.
     *
     * @Route("/{id}/edit", name="portada_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortadaBundle:Portada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Portada entity.');
        }

        $editForm = $this->createEditForm($entity);
     
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Portada entity.
    *
    * @param Portada $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Portada $entity)
    {
        $form = $this->createForm(new PortadaType(), $entity, array(
            'action' => $this->generateUrl('portada_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Portada entity.
     *
     * @Route("/{id}", name="portada_update")
     * @Method("PUT")
     * @Template("PortadaBundle:Portada:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortadaBundle:Portada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Portada entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->subirFoto($this->container->getParameter('portada.directorio.imagenes'));
            $em->flush();

            return $this->redirect($this->generateUrl('portada'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
}
