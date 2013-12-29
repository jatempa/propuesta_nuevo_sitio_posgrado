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
     * Edits an existing Investigadores entity.
     *
     * @Route("/{id}", name="investigadores_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadoresBundle:Investigadores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Investigadores entity.');
        }

        $form = $this->createForm(new InvestigadoresType(), $entity, array(
            'action' => $this->generateUrl('investigadores_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $entity->subirFoto($this->container->getParameter('investigadores.directorio.imagenes'));
            $em->flush();

            return $this->redirect($this->generateUrl('investigadores'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
}
