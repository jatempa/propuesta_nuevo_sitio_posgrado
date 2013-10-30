<?php

namespace DEPI\LineasInvestigacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\LineasInvestigacionBundle\Entity\LineasInvestigacion;
use DEPI\LineasInvestigacionBundle\Form\LineasInvestigacionType;

/**
 * LineasInvestigacion controller.
 *
 * @Route("/lineas")
 */
class LineasInvestigacionController extends Controller
{

    /**
     * Lists all LineasInvestigacion entities.
     *
     * @Route("/", name="lineas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LineasInvestigacionBundle:LineasInvestigacion')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new LineasInvestigacion entity.
     *
     * @Route("/", name="lineas_create")
     * @Method("POST")
     * @Template("LineasInvestigacionBundle:LineasInvestigacion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new LineasInvestigacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lineas_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a LineasInvestigacion entity.
    *
    * @param LineasInvestigacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(LineasInvestigacion $entity)
    {
        $form = $this->createForm(new LineasInvestigacionType(), $entity, array(
            'action' => $this->generateUrl('lineas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new LineasInvestigacion entity.
     *
     * @Route("/new", name="lineas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new LineasInvestigacion();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a LineasInvestigacion entity.
     *
     * @Route("/{id}", name="lineas_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LineasInvestigacionBundle:LineasInvestigacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LineasInvestigacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing LineasInvestigacion entity.
     *
     * @Route("/{id}/edit", name="lineas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LineasInvestigacionBundle:LineasInvestigacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LineasInvestigacion entity.');
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
    * Creates a form to edit a LineasInvestigacion entity.
    *
    * @param LineasInvestigacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(LineasInvestigacion $entity)
    {
        $form = $this->createForm(new LineasInvestigacionType(), $entity, array(
            'action' => $this->generateUrl('lineas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing LineasInvestigacion entity.
     *
     * @Route("/{id}", name="lineas_update")
     * @Method("PUT")
     * @Template("LineasInvestigacionBundle:LineasInvestigacion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LineasInvestigacionBundle:LineasInvestigacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LineasInvestigacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('lineas_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a LineasInvestigacion entity.
     *
     * @Route("/{id}", name="lineas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LineasInvestigacionBundle:LineasInvestigacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LineasInvestigacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lineas'));
    }

    /**
     * Creates a form to delete a LineasInvestigacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lineas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
