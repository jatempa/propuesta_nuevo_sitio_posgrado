<?php

namespace DEPI\ProyectosProductosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\ProyectosProductosBundle\Entity\ProyectosProductos;
use DEPI\ProyectosProductosBundle\Form\ProyectosProductosType;

/**
 * ProyectosProductos controller.
 *
 * @Route("/proyectosproductos")
 */
class ProyectosProductosController extends Controller
{

    /**
     * Lists all ProyectosProductos entities.
     *
     * @Route("/", name="proyectosproductos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProyectosProductosBundle:ProyectosProductos')->findProyectosProductos();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        $respuesta = $this->render('ProyectosProductosBundle:ProyectosProductos:index.html.twig', 
            array('entities' => $pagination)
        );
        
        $respuesta->setMaxAge(15 * 60);

        return $respuesta;
    }
    /**
     * Creates a new ProyectosProductos entity.
     *
     * @Route("/", name="proyectosproductos_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ProyectosProductos();
        $form = $this->createForm(new ProyectosProductosType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('proyectosproductos'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Edits an existing ProyectosProductos entity.
     *
     * @Route("/{id}", name="proyectosproductos_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectosProductosBundle:ProyectosProductos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProyectosProductos entity.');
        }

        $form = $this->createForm(new ProyectosProductosType(), $entity, array(
            'action' => $this->generateUrl('proyectosproductos_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('proyectosproductos'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectosProductosBundle:ProyectosProductos')->deleteProyectosProductos($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProyectosProductos entity.');
        }

        return $this->redirect($this->generateUrl('proyectosproductos'));
    }
}
