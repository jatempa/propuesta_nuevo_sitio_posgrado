<?php

namespace DEPI\ProductosAcademicosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\ProductosAcademicosBundle\Entity\ProductosAcademicos;
use DEPI\ProductosAcademicosBundle\Form\ProductosAcademicosType;

/**
 * ProductosAcademicos controller.
 *
 * @Route("/productosacademicos")
 */
class ProductosAcademicosController extends Controller
{

    /**
     * Lists all ProductosAcademicos entities.
     *
     * @Route("/", name="productosacademicos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProductosAcademicosBundle:ProductosAcademicos')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page',1), 5);

        return array('entities' => $pagination);
    }
    /**
     * Creates a new ProductosAcademicos entity.
     *
     * @Route("/", name="productosacademicos_new")
     * @Method("POST")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ProductosAcademicos();
        $form = $this->createForm(new ProductosAcademicosType(), $entity);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('productosacademicos'));
        }

        return array('entity' => $entity, 'form' => $form->createView());
    }
    /**
     * Displays a form to edit an existing ProductosAcademicos entity.
     *
     * @Route("/{id}/edit", name="productosacademicos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductosAcademicosBundle:ProductosAcademicos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductosAcademicos entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a ProductosAcademicos entity.
    *
    * @param ProductosAcademicos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ProductosAcademicos $entity)
    {
        $form = $this->createForm(new ProductosAcademicosType(), $entity, array(
            'action' => $this->generateUrl('productosacademicos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing ProductosAcademicos entity.
     *
     * @Route("/{id}", name="productosacademicos_update")
     * @Method("PUT")
     * @Template("ProductosAcademicosBundle:ProductosAcademicos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProductosAcademicosBundle:ProductosAcademicos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductosAcademicos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('productosacademicos'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
}
