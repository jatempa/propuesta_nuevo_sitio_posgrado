<?php

namespace DEPI\PosgradoLineasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\PosgradoLineasBundle\Entity\PosgradoLineas;
use DEPI\PosgradoLineasBundle\Form\PosgradoLineasType;

/**
 * PosgradoLineas controller.
 *
 * @Route("/posgradolineas")
 */
class PosgradoLineasController extends Controller
{

    /**
     * Lists all PosgradoLineas entities.
     *
     * @Route("/", name="posgradolineas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PosgradoLineasBundle:PosgradoLineas')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new PosgradoLineas entity.
     *
     * @Route("/", name="posgradolineas_create")
     * @Method("POST")
     * @Template("PosgradoLineasBundle:PosgradoLineas:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new PosgradoLineas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('posgradolineas_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a PosgradoLineas entity.
    *
    * @param PosgradoLineas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(PosgradoLineas $entity)
    {
        $form = $this->createForm(new PosgradoLineasType(), $entity, array(
            'action' => $this->generateUrl('posgradolineas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PosgradoLineas entity.
     *
     * @Route("/new", name="posgradolineas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PosgradoLineas();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a PosgradoLineas entity.
     *
     * @Route("/{id}", name="posgradolineas_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoLineasBundle:PosgradoLineas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoLineas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PosgradoLineas entity.
     *
     * @Route("/{id}/edit", name="posgradolineas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoLineasBundle:PosgradoLineas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoLineas entity.');
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
    * Creates a form to edit a PosgradoLineas entity.
    *
    * @param PosgradoLineas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PosgradoLineas $entity)
    {
        $form = $this->createForm(new PosgradoLineasType(), $entity, array(
            'action' => $this->generateUrl('posgradolineas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PosgradoLineas entity.
     *
     * @Route("/{id}", name="posgradolineas_update")
     * @Method("PUT")
     * @Template("PosgradoLineasBundle:PosgradoLineas:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PosgradoLineasBundle:PosgradoLineas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosgradoLineas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('posgradolineas_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a PosgradoLineas entity.
     *
     * @Route("/{id}", name="posgradolineas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PosgradoLineasBundle:PosgradoLineas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PosgradoLineas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('posgradolineas'));
    }

    /**
     * Creates a form to delete a PosgradoLineas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('posgradolineas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
