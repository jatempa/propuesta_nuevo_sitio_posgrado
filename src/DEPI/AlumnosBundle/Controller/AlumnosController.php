<?php

namespace DEPI\AlumnosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\AlumnosBundle\Entity\Alumnos;
use DEPI\AlumnosBundle\Form\AlumnosType;

/**
 * Alumnos controller.
 *
 * @Route("/alumnos")
 */
class AlumnosController extends Controller
{

    /**
     * Lists all Alumnos entities.
     *
     * @Route("/", name="alumnos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $alumnos = $em->getRepository('AlumnosBundle:Alumnos')->findAlumnos();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($alumnos, $this->getRequest()->query->get('page',1), 5);

        return array('alumnos' => $pagination);
    }
    /**
     * Creates a new Alumnos entity.
     *
     * @Route("/", name="alumnos_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Alumnos();
        $form = $this->createForm(new AlumnosType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $entity->subirFoto($this->container->getParameter('alumnos.directorio.imagenes'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('alumnos'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Edits an existing Alumnos entity.
     *
     * @Route("/{id}", name="alumnos_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlumnosBundle:Alumnos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alumnos entity.');
        }

        $form = $this->createForm(new AlumnosType(), $entity, array(
            'action' => $this->generateUrl('alumnos_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $entity->subirFoto($this->container->getParameter('alumnos.directorio.imagenes'));
            $em->flush();

            return $this->redirect($this->generateUrl('alumnos'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
}
