<?php

namespace DEPI\NoticiasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\NoticiasBundle\Entity\Noticias;
use DEPI\NoticiasBundle\Form\NoticiasType;

/**
 * Noticias controller.
 *
 * @Route("/noticias")
 */
class NoticiasController extends Controller
{

    /**
     * Lists all Noticias entities.
     *
     * @Route("/", name="noticias")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('NoticiasBundle:Noticias')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new Noticias entity.
     *
     * @Route("/", name="noticias_create")
     * @Method("POST")
     * @Template("NoticiasBundle:Noticias:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Noticias();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->subirDocumento($this->container->getParameter('portada.directorio.documentos'));
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('noticias'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Noticias entity.
    *
    * @param Noticias $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Noticias $entity)
    {
        $form = $this->createForm(new NoticiasType(), $entity, array(
            'action' => $this->generateUrl('noticias_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Noticias entity.
     *
     * @Route("/new", name="noticias_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Noticias();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Noticias entity.
     *
     * @Route("/{id}/edit", name="noticias_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NoticiasBundle:Noticias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Noticias entity.');
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
    * Creates a form to edit a Noticias entity.
    *
    * @param Noticias $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Noticias $entity)
    {
        $form = $this->createForm(new NoticiasType(), $entity, array(
            'action' => $this->generateUrl('noticias_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Noticias entity.
     *
     * @Route("/{id}", name="noticias_update")
     * @Method("PUT")
     * @Template("NoticiasBundle:Noticias:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NoticiasBundle:Noticias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Noticias entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->subirDocumento($this->container->getParameter('portada.directorio.documentos'));
            $em->flush();

            return $this->redirect($this->generateUrl('noticias'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Noticias entity.
     *
     * @Route("/{id}", name="noticias_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('NoticiasBundle:Noticias')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Noticias entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('noticias'));
    }

    /**
     * Creates a form to delete a Noticias entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('noticias_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
