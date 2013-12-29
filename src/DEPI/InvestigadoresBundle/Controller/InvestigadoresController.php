<?php

namespace DEPI\InvestigadoresBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\InvestigadoresBundle\Entity\Investigadores;
use DEPI\InvestigadoresBundle\Form\InvestigadoresType;

/**
 * Investigadores controller.
 *
 * @Route("/investigadores")
 */
class InvestigadoresController extends Controller
{
    /**
     * Lists all Investigadores entities.
     *
     * @Route("/", name="investigadores")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InvestigadoresBundle:Investigadores')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new Investigadores entity.
     *
     * @Route("/", name="investigadores_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Investigadores();
        $form = $this->createForm(new InvestigadoresType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $entity->subirFoto($this->container->getParameter('investigadores.directorio.imagenes'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('investigadores'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Displays a form to edit an existing Investigadores entity.
     *
     * @Route("/{id}/edit", name="investigadores_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadoresBundle:Investigadores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Investigadores entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Investigadores entity.
    *
    * @param Investigadores $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Investigadores $entity)
    {
        $form = $this->createForm(new InvestigadoresType(), $entity, array(
            'action' => $this->generateUrl('investigadores_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Investigadores entity.
     *
     * @Route("/{id}", name="investigadores_update")
     * @Method("PUT")
     * @Template("InvestigadoresBundle:Investigadores:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadoresBundle:Investigadores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Investigadores entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->subirFoto($this->container->getParameter('investigadores.directorio.imagenes'));
            $em->flush();

            return $this->redirect($this->generateUrl('investigadores'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
}
