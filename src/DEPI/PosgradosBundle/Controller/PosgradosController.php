<?php

namespace DEPI\PosgradosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\PosgradosBundle\Entity\Posgrados;
use DEPI\PosgradosBundle\Form\PosgradosType;

/**
 * Posgrados controller.
 *
 * @Route("/posgrados")
 */
class PosgradosController extends Controller
{

    /**
     * Lists all Posgrados entities.
     *
     * @Route("/", name="posgrados")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PosgradosBundle:Posgrados')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new Posgrados entity.
     *
     * @Route("/", name="posgrados_create")
     * @Method("POST")
     * @Template("PosgradosBundle:Posgrados:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Posgrados();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('posgrados'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Posgrados entity.
    *
    * @param Posgrados $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Posgrados $entity)
    {
        $form = $this->createForm(new PosgradosType(), $entity, array(
            'action' => $this->generateUrl('posgrados_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Posgrados entity.
     *
     * @Route("/new", name="posgrados_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Posgrados();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Posgrados entity.
     *
     * @Route("/{id}/edit", name="posgrados_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradosBundle:Posgrados')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Posgrados entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Posgrados entity.
    *
    * @param Posgrados $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Posgrados $entity)
    {
        $form = $this->createForm(new PosgradosType(), $entity, array(
            'action' => $this->generateUrl('posgrados_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Posgrados entity.
     *
     * @Route("/{id}", name="posgrados_update")
     * @Method("PUT")
     * @Template("PosgradosBundle:Posgrados:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradosBundle:Posgrados')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Posgrados entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('posgrados'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
}
