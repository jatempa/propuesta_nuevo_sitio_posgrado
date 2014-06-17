<?php

namespace DEPI\PosgradoAreasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\PosgradoAreasBundle\Entity\PosgradoAreas;
use DEPI\PosgradoAreasBundle\Form\PosgradoAreasType;

/**
 * PosgradoAreas controller.
 *
 * @Route("/posgradoareas")
 */
class PosgradoAreasController extends Controller
{

    /**
     * Lists all PosgradoAreas entities.
     *
     * @Route("/", name="posgradoareas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PosgradoAreasBundle:PosgradoAreas')->findPosgradoAreas();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new PosgradoAreas entity.
     *
     * @Route("/", name="posgradoareas_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PosgradoAreas();
        $form = $this->createForm(new PosgradoAreasType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('posgradoareas'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Edits an existing PosgradoAreas entity.
     *
     * @Route("/{id}", name="posgradoareas_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoAreasBundle:PosgradoAreas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoAreas entity.');
        }

        $form = $this->createForm(new PosgradoAreasType(), $entity, array(
            'action' => $this->generateUrl('posgradoareas_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('posgradoareas'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoAreasBundle:PosgradoAreas')->deletePosgradoAreas($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoAreas entity.');
        }

        return $this->redirect($this->generateUrl('posgradoareas'));
    }
}