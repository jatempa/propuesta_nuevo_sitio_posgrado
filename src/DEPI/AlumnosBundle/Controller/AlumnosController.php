<?php

namespace DEPI\AlumnosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\AlumnosBundle\Entity\Alumnos;
use DEPI\AlumnosBundle\Form\AlumnosType;

/**
 * Alumnos controller.
 *
 * @Route("/alumnos")
 */
class AlumnosController extends Controller
{

    /**
     * Lists all Alumnos entities.
     *
     * @Route("/", name="alumnos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $alumnos = $em->getRepository('AlumnosBundle:Alumnos')->findAlumnos();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($alumnos, $this->get('request')->query->get('page',1), 5);

        return $this->render('AlumnosBundle:Alumnos:index.html.twig', array('alumnos' => $pagination));
    }
    /**
     * Creates a new Alumnos entity.
     *
     * @Route("/", name="alumnos_create")
     * @Method("POST")
     * @Template("AlumnosBundle:Alumnos:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Alumnos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->subirFoto($this->container->getParameter('alumnos.directorio.imagenes'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('alumnos'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Alumnos entity.
    *
    * @param Alumnos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Alumnos $entity)
    {
        $form = $this->createForm(new AlumnosType(), $entity, array(
            'action' => $this->generateUrl('alumnos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Alumnos entity.
     *
     * @Route("/new", name="alumnos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Alumnos();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Alumnos entity.
     *
     * @Route("/{id}/edit", name="alumnos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlumnosBundle:Alumnos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alumnos entity.');
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
    * Creates a form to edit a Alumnos entity.
    *
    * @param Alumnos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Alumnos $entity)
    {
        $form = $this->createForm(new AlumnosType(), $entity, array(
            'action' => $this->generateUrl('alumnos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Alumnos entity.
     *
     * @Route("/{id}", name="alumnos_update")
     * @Method("PUT")
     * @Template("AlumnosBundle:Alumnos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlumnosBundle:Alumnos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alumnos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->subirFoto($this->container->getParameter('alumnos.directorio.imagenes'));
            $em->flush();

            return $this->redirect($this->generateUrl('alumnos'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Alumnos entity.
     *
     * @Route("/{id}", name="alumnos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AlumnosBundle:Alumnos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Alumnos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('alumnos'));
    }

    /**
     * Creates a form to delete a Alumnos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('alumnos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
