<?php

namespace DEPI\InvestigadoresLineasBundle\Controller;

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

        return array('entities' => $pagination);
    }
    /**
     * Creates a new InvestigadoresLineas entity.
     *
     * @Route("/", name="investigadoreslineas_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new InvestigadoresLineas();
        $form = $this->createForm(new InvestigadoresLineasType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('investigadoreslineas'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Edits an existing InvestigadoresLineas entity.
     *
     * @Route("/{id}", name="investigadoreslineas_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadoresLineasBundle:InvestigadoresLineas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InvestigadoresLineas entity.');
        }

        $form = $this->createForm(new InvestigadoresLineasType(), $entity, array(
            'action' => $this->generateUrl('investigadoreslineas_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('investigadoreslineas'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadoresLineasBundle:InvestigadoresLineas')->deleteInvestigadoresLineas($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InvestigadoresLineas entity.');
        }

        return $this->redirect($this->generateUrl('investigadoreslineas'));
    }
}
