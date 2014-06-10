<?php

namespace DEPI\PortadaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\PortadaBundle\Entity\Portada;
use DEPI\PortadaBundle\Form\PortadaType;

/**
 * Portada controller.
 *
 * @Route("/portada")
 */
class PortadaController extends Controller
{

    /**
     * Lists all Portada entities.
     *
     * @Route("/", name="portada")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PortadaBundle:Portada')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        $respuesta = $this->render('PortadaBundle:Portada:index.html.twig',
            array('entities' => $pagination)
        );
        $respuesta->setMaxAge(15 * 60);

        return $respuesta;   
    }
    /**
     * Creates a new Portada entity.
     *
     * @Route("/", name="portada_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Portada();
        $form = $this->createForm(new PortadaType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $entity->subirFoto($this->container->getParameter('portada.directorio.imagenes'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('portada'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Edits an existing Portada entity.
     *
     * @Route("/{id}", name="portada_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortadaBundle:Portada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Portada entity.');
        }

        $form = $this->createForm(new PortadaType(), $entity, array(
            'action' => $this->generateUrl('portada_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $entity->subirFoto($this->container->getParameter('portada.directorio.imagenes'));
            $em->flush();

            return $this->redirect($this->generateUrl('portada'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortadaBundle:Portada')->deletePortada($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Portada entity.');
        }

        return $this->redirect($this->generateUrl('portada'));
    }
}
