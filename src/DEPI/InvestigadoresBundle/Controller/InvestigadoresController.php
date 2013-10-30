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

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Investigadores entity.
     *
     * @Route("/", name="investigadores_create")
     * @Method("POST")
     * @Template("InvestigadoresBundle:Investigadores:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Investigadores();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('investigadores_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Investigadores entity.
    *
    * @param Investigadores $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Investigadores $entity)
    {
        $form = $this->createForm(new InvestigadoresType(), $entity, array(
            'action' => $this->generateUrl('investigadores_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Investigadores entity.
     *
     * @Route("/new", name="investigadores_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Investigadores();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Investigadores entity.
     *
     * @Route("/{id}", name="investigadores_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadoresBundle:Investigadores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Investigadores entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Investigadores entity.
     *
     * @Route("/{id}/edit", name="investigadores_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadoresBundle:Investigadores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Investigadores entity.');
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
    * Creates a form to edit a Investigadores entity.
    *
    * @param Investigadores $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Investigadores $entity)
    {
        $form = $this->createForm(new InvestigadoresType(), $entity, array(
            'action' => $this->generateUrl('investigadores_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Investigadores entity.
     *
     * @Route("/{id}", name="investigadores_update")
     * @Method("PUT")
     * @Template("InvestigadoresBundle:Investigadores:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadoresBundle:Investigadores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Investigadores entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('investigadores_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Investigadores entity.
     *
     * @Route("/{id}", name="investigadores_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InvestigadoresBundle:Investigadores')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Investigadores entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('investigadores'));
    }

    /**
     * Creates a form to delete a Investigadores entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('investigadores_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
