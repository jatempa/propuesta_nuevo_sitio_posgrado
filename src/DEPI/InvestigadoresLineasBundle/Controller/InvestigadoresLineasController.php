<?php

namespace DEPI\InvestigadoresLineasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\InvestigadoresLineasBundle\Entity\InvestigadoresLineas;
use DEPI\InvestigadoresLineasBundle\Form\InvestigadoresLineasType;

/**
 * InvestigadoresLineas controller.
 *
 * @Route("/investigadoreslineas")
 */
class InvestigadoresLineasController extends Controller
{

    /**
     * Lists all InvestigadoresLineas entities.
     *
     * @Route("/", name="investigadoreslineas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InvestigadoresLineasBundle:InvestigadoresLineas')->findInvestigadoresLineas();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return $this->render('InvestigadoresLineasBundle:InvestigadoresLineas:index.html.twig', 
                              array('entities' => $pagination,));
    }
    /**
     * Creates a new InvestigadoresLineas entity.
     *
     * @Route("/", name="investigadoreslineas_create")
     * @Method("POST")
     * @Template("InvestigadoresLineasBundle:InvestigadoresLineas:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new InvestigadoresLineas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('investigadoreslineas'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a InvestigadoresLineas entity.
    *
    * @param InvestigadoresLineas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(InvestigadoresLineas $entity)
    {
        $form = $this->createForm(new InvestigadoresLineasType(), $entity, array(
            'action' => $this->generateUrl('investigadoreslineas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new InvestigadoresLineas entity.
     *
     * @Route("/new", name="investigadoreslineas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new InvestigadoresLineas();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing InvestigadoresLineas entity.
     *
     * @Route("/{id}/edit", name="investigadoreslineas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadoresLineasBundle:InvestigadoresLineas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InvestigadoresLineas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a InvestigadoresLineas entity.
    *
    * @param InvestigadoresLineas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(InvestigadoresLineas $entity)
    {
        $form = $this->createForm(new InvestigadoresLineasType(), $entity, array(
            'action' => $this->generateUrl('investigadoreslineas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
  
    /**
     * Edits an existing InvestigadoresLineas entity.
     *
     * @Route("/{id}", name="investigadoreslineas_update")
     * @Method("PUT")
     * @Template("InvestigadoresLineasBundle:InvestigadoresLineas:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadoresLineasBundle:InvestigadoresLineas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InvestigadoresLineas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('investigadoreslineas'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a InvestigadoresLineas entity.
     *
     * @Route("/{id}", name="investigadoreslineas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InvestigadoresLineasBundle:InvestigadoresLineas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find InvestigadoresLineas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('investigadoreslineas'));
    }

    /**
     * Creates a form to delete a InvestigadoresLineas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('investigadoreslineas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
