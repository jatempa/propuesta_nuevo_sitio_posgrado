<?php

namespace DEPI\NoticiasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\NoticiasBundle\Entity\Noticias;
use DEPI\NoticiasBundle\Form\NoticiasType;

/**
 * Noticias controller.
 *
 * @Route("/noticias")
 */
class NoticiasController extends Controller
{

    /**
     * Lists all Noticias entities.
     *
     * @Route("/", name="noticias")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('NoticiasBundle:Noticias')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new Noticias entity.
     *
     * @Route("/", name="noticias_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Noticias();
        $form = $this->createForm(new NoticiasType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('noticias'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Edits an existing Noticias entity.
     *
     * @Route("/{id}", name="noticias_edit")
     * @Method("PUT")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NoticiasBundle:Noticias')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Noticias entity.');
        }

        $form = $this->createForm(new NoticiasType(), $entity, array(
            'action' => $this->generateUrl('noticias_edit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('noticias'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
}
