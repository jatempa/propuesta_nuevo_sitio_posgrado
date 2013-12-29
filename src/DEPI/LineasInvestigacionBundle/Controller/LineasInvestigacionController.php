<?php

namespace DEPI\LineasInvestigacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\LineasInvestigacionBundle\Entity\LineasInvestigacion;
use DEPI\LineasInvestigacionBundle\Form\LineasInvestigacionType;

/**
 * LineasInvestigacion controller.
 *
 * @Route("/lineas")
 */
class LineasInvestigacionController extends Controller
{

    /**
     * Lists all LineasInvestigacion entities.
     *
     * @Route("/", name="lineas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LineasInvestigacionBundle:LineasInvestigacion')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new LineasInvestigacion entity.
     *
     * @Route("/", name="lineas_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new LineasInvestigacion();
        $form = $this->createForm(new LineasInvestigacionType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lineas'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Displays a form to edit an existing LineasInvestigacion entity.
     *
     * @Route("/{id}/edit", name="lineas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LineasInvestigacionBundle:LineasInvestigacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LineasInvestigacion entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a LineasInvestigacion entity.
    *
    * @param LineasInvestigacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(LineasInvestigacion $entity)
    {
        $form = $this->createForm(new LineasInvestigacionType(), $entity, array(
            'action' => $this->generateUrl('lineas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing LineasInvestigacion entity.
     *
     * @Route("/{id}", name="lineas_update")
     * @Method("PUT")
     * @Template("LineasInvestigacionBundle:LineasInvestigacion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LineasInvestigacionBundle:LineasInvestigacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LineasInvestigacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('lineas'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
}
