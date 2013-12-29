<?php

namespace DEPI\InvestigadorProyectoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\InvestigadorProyectoBundle\Entity\InvestigadorProyecto;
use DEPI\InvestigadorProyectoBundle\Form\InvestigadorProyectoType;

/**
 * InvestigadorProyecto controller.
 *
 * @Route("/investigadorproyecto")
 */
class InvestigadorProyectoController extends Controller
{

    /**
     * Lists all InvestigadorProyecto entities.
     *
     * @Route("/", name="investigadorproyecto")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InvestigadorProyectoBundle:InvestigadorProyecto')->findInvestigadorProyecto();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new InvestigadorProyecto entity.
     *
     * @Route("/", name="investigadorproyecto_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new InvestigadorProyecto();
        $form = $this->createForm(new InvestigadorProyectoType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('investigadorproyecto'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Displays a form to edit an existing InvestigadorProyecto entity.
     *
     * @Route("/{id}/edit", name="investigadorproyecto_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadorProyectoBundle:InvestigadorProyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InvestigadorProyecto entity.');
        }

        $editForm = $this->createEditForm($entity);
     
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a InvestigadorProyecto entity.
    *
    * @param InvestigadorProyecto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(InvestigadorProyecto $entity)
    {
        $form = $this->createForm(new InvestigadorProyectoType(), $entity, array(
            'action' => $this->generateUrl('investigadorproyecto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing InvestigadorProyecto entity.
     *
     * @Route("/{id}", name="investigadorproyecto_update")
     * @Method("PUT")
     * @Template("InvestigadorProyectoBundle:InvestigadorProyecto:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadorProyectoBundle:InvestigadorProyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InvestigadorProyecto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('investigadorproyecto'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
}
