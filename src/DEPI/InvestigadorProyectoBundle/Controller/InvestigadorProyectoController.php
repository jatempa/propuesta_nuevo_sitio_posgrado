<?php

namespace DEPI\InvestigadorProyectoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\InvestigadorProyectoBundle\Entity\InvestigadorProyecto;
use DEPI\InvestigadorProyectoBundle\Form\InvestigadorProyectoType;

/**
 * InvestigadorProyecto controller.
 *
 * @Route("/investigadorproyecto")
 */
class InvestigadorProyectoController extends Controller
{

    /**
     * Lists all InvestigadorProyecto entities.
     *
     * @Route("/", name="investigadorproyecto")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InvestigadorProyectoBundle:InvestigadorProyecto')->findInvestigadorProyecto();

        return $this->render('InvestigadorProyectoBundle:InvestigadorProyecto:index.html.twig', 
                              array('entities' => $entities,));
    }
    /**
     * Creates a new InvestigadorProyecto entity.
     *
     * @Route("/", name="investigadorproyecto_create")
     * @Method("POST")
     * @Template("InvestigadorProyectoBundle:InvestigadorProyecto:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new InvestigadorProyecto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('investigadorproyecto', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a InvestigadorProyecto entity.
    *
    * @param InvestigadorProyecto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(InvestigadorProyecto $entity)
    {
        $form = $this->createForm(new InvestigadorProyectoType(), $entity, array(
            'action' => $this->generateUrl('investigadorproyecto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new InvestigadorProyecto entity.
     *
     * @Route("/new", name="investigadorproyecto_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new InvestigadorProyecto();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a InvestigadorProyecto entity.
     *
     * @Route("/{id}", name="investigadorproyecto_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadorProyectoBundle:InvestigadorProyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InvestigadorProyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing InvestigadorProyecto entity.
     *
     * @Route("/{id}/edit", name="investigadorproyecto_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadorProyectoBundle:InvestigadorProyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InvestigadorProyecto entity.');
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
    * Creates a form to edit a InvestigadorProyecto entity.
    *
    * @param InvestigadorProyecto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(InvestigadorProyecto $entity)
    {
        $form = $this->createForm(new InvestigadorProyectoType(), $entity, array(
            'action' => $this->generateUrl('investigadorproyecto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing InvestigadorProyecto entity.
     *
     * @Route("/{id}", name="investigadorproyecto_update")
     * @Method("PUT")
     * @Template("InvestigadorProyectoBundle:InvestigadorProyecto:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InvestigadorProyectoBundle:InvestigadorProyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InvestigadorProyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('investigadorproyecto', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a InvestigadorProyecto entity.
     *
     * @Route("/{id}", name="investigadorproyecto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InvestigadorProyectoBundle:InvestigadorProyecto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find InvestigadorProyecto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('investigadorproyecto'));
    }

    /**
     * Creates a form to delete a InvestigadorProyecto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('investigadorproyecto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
