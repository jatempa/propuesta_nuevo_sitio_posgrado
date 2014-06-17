<?php

namespace DEPI\PosgradoInvestigadoresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\PosgradoInvestigadoresBundle\Entity\PosgradoInvestigadores;
use DEPI\PosgradoInvestigadoresBundle\Form\PosgradoInvestigadoresType;

/**
 * PosgradoInvestigadores controller.
 *
 * @Route("/posgradoinvestigadores")
 */
class PosgradoInvestigadoresController extends Controller
{

    /**
     * Lists all PosgradoInvestigadores entities.
     *
     * @Route("/", name="posgradoinvestigadores")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PosgradoInvestigadoresBundle:PosgradoInvestigadores')->findPosgradoInvestigadores();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new PosgradoInvestigadores entity.
     *
     * @Route("/", name="posgradoinvestigadores_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PosgradoInvestigadores();
        $form = $this->createForm(new PosgradoInvestigadoresType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('posgradoinvestigadores'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Edits an existing PosgradoInvestigadores entity.
     *
     * @Route("/{id}", name="posgradoinvestigadores_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoInvestigadoresBundle:PosgradoInvestigadores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoInvestigadores entity.');
        }

        $form = $this->createForm(new PosgradoInvestigadoresType(), $entity, array(
            'action' => $this->generateUrl('posgradoinvestigadores_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('posgradoinvestigadores'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoInvestigadoresBundle:PosgradoInvestigadores')->deletePosgradoInvestigadores($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoInvestigadores entity.');
        }

        return $this->redirect($this->generateUrl('posgradoinvestigadores'));
    }
}
