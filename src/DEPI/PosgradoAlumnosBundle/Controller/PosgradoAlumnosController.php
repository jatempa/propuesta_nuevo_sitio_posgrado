<?php

namespace DEPI\PosgradoAlumnosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\PosgradoAlumnosBundle\Entity\PosgradoAlumnos;
use DEPI\PosgradoAlumnosBundle\Form\PosgradoAlumnosType;

/**
 * PosgradoAlumnos controller.
 *
 * @Route("/posgradoalumnos")
 */
class PosgradoAlumnosController extends Controller
{

    /**
     * Lists all PosgradoAlumnos entities.
     *
     * @Route("/", name="posgradoalumnos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PosgradoAlumnosBundle:PosgradoAlumnos')->findPosgradoAlumnos();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);
        
        return array('entities' => $pagination);
    }
    /**
     * Creates a new PosgradoAlumnos entity.
     *
     * @Route("/", name="posgradoalumnos_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PosgradoAlumnos();
        $form = $this->createForm(new PosgradoAlumnosType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('posgradoalumnos'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Edits an existing PosgradoAlumnos entity.
     *
     * @Route("/{id}", name="posgradoalumnos_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoAlumnosBundle:PosgradoAlumnos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoAlumnos entity.');
        }

        $form = $this->createForm(new PosgradoAlumnosType(), $entity, array(
            'action' => $this->generateUrl('posgradoalumnos_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('posgradoalumnos'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoAlumnosBundle:PosgradoAlumnos')->deletePosgradoAlumnos($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoAlumnos entity.');
        }

        return $this->redirect($this->generateUrl('posgradoalumnos'));
    }
}
