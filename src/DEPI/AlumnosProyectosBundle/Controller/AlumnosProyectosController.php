<?php

namespace DEPI\AlumnosProyectosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\AlumnosProyectosBundle\Entity\AlumnosProyectos;
use DEPI\AlumnosProyectosBundle\Form\AlumnosProyectosType;

/**
 * AlumnosProyectos controller.
 *
 * @Route("/alumnosproyectos")
 */
class AlumnosProyectosController extends Controller
{

    /**
     * Lists all AlumnosProyectos entities.
     *
     * @Route("/", name="alumnosproyectos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $alumnosenproyectos = $em->getRepository('AlumnosProyectosBundle:AlumnosProyectos')
                                 ->findAlumnosConProyecto();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($alumnosenproyectos, $this->get('request')->query->get('page',1), 5);

        return array('alumnosenproyectos' => $pagination);
    }
    /**
     * Creates a new AlumnosProyectos entity.
     *
     * @Route("/", name="alumnosproyectos_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AlumnosProyectos();
        $form = $this->createForm(new AlumnosProyectosType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('alumnosproyectos'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Edits an existing AlumnosProyectos entity.
     *
     * @Route("/{id}", name="alumnosproyectos_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlumnosProyectosBundle:AlumnosProyectos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AlumnosProyectos entity.');
        }

        $form = $this->createForm(new AlumnosProyectosType(), $entity, array(
            'action' => $this->generateUrl('alumnosproyectos_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('alumnosproyectos'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlumnosProyectosBundle:AlumnosProyectos')->deleteAlumnosProyectos($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AlumnosProyectos entity.');
        }

        return $this->redirect($this->generateUrl('alumnosproyectos'));
    }
}
