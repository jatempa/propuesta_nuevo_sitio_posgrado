<?php

namespace DEPI\PosgradoAreasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\PosgradoAreasBundle\Entity\PosgradoAreas;
use DEPI\PosgradoAreasBundle\Form\PosgradoAreasType;

/**
 * PosgradoAreas controller.
 *
 * @Route("/posgradoareas")
 */
class PosgradoAreasController extends Controller
{

    /**
     * Lists all PosgradoAreas entities.
     *
     * @Route("/", name="posgradoareas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PosgradoAreasBundle:PosgradoAreas')->findPosgradoAreas();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new PosgradoAreas entity.
     *
     * @Route("/", name="posgradoareas_create")
     * @Method("POST")
     * @Template("PosgradoAreasBundle:PosgradoAreas:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new PosgradoAreas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('posgradoareas'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a PosgradoAreas entity.
    *
    * @param PosgradoAreas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(PosgradoAreas $entity)
    {
        $form = $this->createForm(new PosgradoAreasType(), $entity, array(
            'action' => $this->generateUrl('posgradoareas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new PosgradoAreas entity.
     *
     * @Route("/new", name="posgradoareas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PosgradoAreas();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PosgradoAreas entity.
     *
     * @Route("/{id}/edit", name="posgradoareas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoAreasBundle:PosgradoAreas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoAreas entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a PosgradoAreas entity.
    *
    * @param PosgradoAreas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PosgradoAreas $entity)
    {
        $form = $this->createForm(new PosgradoAreasType(), $entity, array(
            'action' => $this->generateUrl('posgradoareas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing PosgradoAreas entity.
     *
     * @Route("/{id}", name="posgradoareas_update")
     * @Method("PUT")
     * @Template("PosgradoAreasBundle:PosgradoAreas:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoAreasBundle:PosgradoAreas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoAreas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('posgradoareas'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
}