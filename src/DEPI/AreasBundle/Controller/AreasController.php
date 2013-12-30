<?php

namespace DEPI\AreasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\AreasBundle\Entity\Areas;
use DEPI\AreasBundle\Form\AreasType;

/**
 * Areas controller.
 *
 * @Route("/areas")
 */
class AreasController extends Controller
{

    /**
     * Lists all Areas entities.
     *
     * @Route("/", name="areas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AreasBundle:Areas')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }   
    /**
     * Creates a new Areas entity.
     *
     * @Route("/", name="areas_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Areas();
        $form = $this->createForm(new AreasType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('areas'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Edits an existing Areas entity.
     *
     * @Route("/{id}", name="areas_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AreasBundle:Areas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Areas entity.');
        }

        $form = $this->createForm(new AreasType(), $entity, array(
            'action' => $this->generateUrl('areas_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('areas'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AreasBundle:Areas')->deleteAreas($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Areas entity.');
        }

        return $this->redirect($this->generateUrl('areas'));
    }
}
