<?php

namespace DEPI\PosgradoLineasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\PosgradoLineasBundle\Entity\PosgradoLineas;
use DEPI\PosgradoLineasBundle\Form\PosgradoLineasType;

/**
 * PosgradoLineas controller.
 *
 * @Route("/posgradolineas")
 */
class PosgradoLineasController extends Controller
{

    /**
     * Lists all PosgradoLineas entities.
     *
     * @Route("/", name="posgradolineas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PosgradoLineasBundle:PosgradoLineas')->findPosgradoLineas();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new PosgradoLineas entity.
     *
     * @Route("/", name="posgradolineas_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PosgradoLineas();
        $form = $this->createForm(new PosgradoLineasType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('posgradolineas'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Edits an existing PosgradoLineas entity.
     *
     * @Route("/{id}", name="posgradolineas_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoLineasBundle:PosgradoLineas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoLineas entity.');
        }

        $form = $this->createForm(new PosgradoLineasType(), $entity, array(
            'action' => $this->generateUrl('posgradolineas_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('posgradolineas'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
}
