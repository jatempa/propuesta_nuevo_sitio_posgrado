<?php

namespace DEPI\PosgradoAlumnosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\PosgradoAlumnosBundle\Entity\PosgradoAlumnos;
use DEPI\PosgradoAlumnosBundle\Form\PosgradoAlumnosType;

/**
 * PosgradoAlumnos controller.
 *
 * @Route("/posgradoalumnos")
 */
class PosgradoAlumnosController extends Controller
{

    /**
     * Lists all PosgradoAlumnos entities.
     *
     * @Route("/", name="posgradoalumnos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PosgradoAlumnosBundle:PosgradoAlumnos')->findPosgradoAlumnos();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return $this->render('PosgradoAlumnosBundle:PosgradoAlumnos:index.html.twig', array('entities' => $pagination));
    }
    /**
     * Creates a new PosgradoAlumnos entity.
     *
     * @Route("/", name="posgradoalumnos_create")
     * @Method("POST")
     * @Template("PosgradoAlumnosBundle:PosgradoAlumnos:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new PosgradoAlumnos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('posgradoalumnos'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a PosgradoAlumnos entity.
    *
    * @param PosgradoAlumnos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(PosgradoAlumnos $entity)
    {
        $form = $this->createForm(new PosgradoAlumnosType(), $entity, array(
            'action' => $this->generateUrl('posgradoalumnos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new PosgradoAlumnos entity.
     *
     * @Route("/new", name="posgradoalumnos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PosgradoAlumnos();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PosgradoAlumnos entity.
     *
     * @Route("/{id}/edit", name="posgradoalumnos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoAlumnosBundle:PosgradoAlumnos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoAlumnos entity.');
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
    * Creates a form to edit a PosgradoAlumnos entity.
    *
    * @param PosgradoAlumnos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PosgradoAlumnos $entity)
    {
        $form = $this->createForm(new PosgradoAlumnosType(), $entity, array(
            'action' => $this->generateUrl('posgradoalumnos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing PosgradoAlumnos entity.
     *
     * @Route("/{id}", name="posgradoalumnos_update")
     * @Method("PUT")
     * @Template("PosgradoAlumnosBundle:PosgradoAlumnos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoAlumnosBundle:PosgradoAlumnos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoAlumnos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('posgradoalumnos'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a PosgradoAlumnos entity.
     *
     * @Route("/{id}", name="posgradoalumnos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PosgradoAlumnosBundle:PosgradoAlumnos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PosgradoAlumnos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('posgradoalumnos'));
    }

    /**
     * Creates a form to delete a PosgradoAlumnos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('posgradoalumnos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
