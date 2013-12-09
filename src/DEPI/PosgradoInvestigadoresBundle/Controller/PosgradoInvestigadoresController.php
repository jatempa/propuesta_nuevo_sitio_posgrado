<?php

namespace DEPI\PosgradoInvestigadoresBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\PosgradoInvestigadoresBundle\Entity\PosgradoInvestigadores;
use DEPI\PosgradoInvestigadoresBundle\Form\PosgradoInvestigadoresType;

/**
 * PosgradoInvestigadores controller.
 *
 * @Route("/posgradoinvestigadores")
 */
class PosgradoInvestigadoresController extends Controller
{

    /**
     * Lists all PosgradoInvestigadores entities.
     *
     * @Route("/", name="posgradoinvestigadores")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PosgradoInvestigadoresBundle:PosgradoInvestigadores')->findPosgradoInvestigadores();

        return $this->render('PosgradoInvestigadoresBundle:PosgradoInvestigadores:index.html.twig', array('entities' => $entities));
    }
    /**
     * Creates a new PosgradoInvestigadores entity.
     *
     * @Route("/", name="posgradoinvestigadores_create")
     * @Method("POST")
     * @Template("PosgradoInvestigadoresBundle:PosgradoInvestigadores:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new PosgradoInvestigadores();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('posgradoinvestigadores'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a PosgradoInvestigadores entity.
    *
    * @param PosgradoInvestigadores $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(PosgradoInvestigadores $entity)
    {
        $form = $this->createForm(new PosgradoInvestigadoresType(), $entity, array(
            'action' => $this->generateUrl('posgradoinvestigadores_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new PosgradoInvestigadores entity.
     *
     * @Route("/new", name="posgradoinvestigadores_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PosgradoInvestigadores();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PosgradoInvestigadores entity.
     *
     * @Route("/{id}/edit", name="posgradoinvestigadores_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoInvestigadoresBundle:PosgradoInvestigadores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoInvestigadores entity.');
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
    * Creates a form to edit a PosgradoInvestigadores entity.
    *
    * @param PosgradoInvestigadores $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PosgradoInvestigadores $entity)
    {
        $form = $this->createForm(new PosgradoInvestigadoresType(), $entity, array(
            'action' => $this->generateUrl('posgradoinvestigadores_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing PosgradoInvestigadores entity.
     *
     * @Route("/{id}", name="posgradoinvestigadores_update")
     * @Method("PUT")
     * @Template("PosgradoInvestigadoresBundle:PosgradoInvestigadores:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoInvestigadoresBundle:PosgradoInvestigadores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoInvestigadores entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('posgradoinvestigadores'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a PosgradoInvestigadores entity.
     *
     * @Route("/{id}", name="posgradoinvestigadores_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PosgradoInvestigadoresBundle:PosgradoInvestigadores')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PosgradoInvestigadores entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('posgradoinvestigadores'));
    }

    /**
     * Creates a form to delete a PosgradoInvestigadores entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('posgradoinvestigadores_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
