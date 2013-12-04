<?php

namespace DEPI\EntidadApoyoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\EntidadApoyoBundle\Entity\EntidadApoyo;
use DEPI\EntidadApoyoBundle\Form\EntidadApoyoType;

/**
 * EntidadApoyo controller.
 *
 * @Route("/entidadapoyo")
 */
class EntidadApoyoController extends Controller
{

    /**
     * Lists all EntidadApoyo entities.
     *
     * @Route("/", name="entidadapoyo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EntidadApoyoBundle:EntidadApoyo')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EntidadApoyo entity.
     *
     * @Route("/", name="entidadapoyo_create")
     * @Method("POST")
     * @Template("EntidadApoyoBundle:EntidadApoyo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EntidadApoyo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('entidadapoyo'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a EntidadApoyo entity.
    *
    * @param EntidadApoyo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(EntidadApoyo $entity)
    {
        $form = $this->createForm(new EntidadApoyoType(), $entity, array(
            'action' => $this->generateUrl('entidadapoyo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new EntidadApoyo entity.
     *
     * @Route("/new", name="entidadapoyo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EntidadApoyo();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EntidadApoyo entity.
     *
     * @Route("/{id}/edit", name="entidadapoyo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EntidadApoyoBundle:EntidadApoyo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EntidadApoyo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a EntidadApoyo entity.
    *
    * @param EntidadApoyo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EntidadApoyo $entity)
    {
        $form = $this->createForm(new EntidadApoyoType(), $entity, array(
            'action' => $this->generateUrl('entidadapoyo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing EntidadApoyo entity.
     *
     * @Route("/{id}", name="entidadapoyo_update")
     * @Method("PUT")
     * @Template("EntidadApoyoBundle:EntidadApoyo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EntidadApoyoBundle:EntidadApoyo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EntidadApoyo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('entidadapoyo'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a EntidadApoyo entity.
     *
     * @Route("/{id}", name="entidadapoyo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EntidadApoyoBundle:EntidadApoyo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EntidadApoyo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('entidadapoyo'));
    }

    /**
     * Creates a form to delete a EntidadApoyo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('entidadapoyo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
