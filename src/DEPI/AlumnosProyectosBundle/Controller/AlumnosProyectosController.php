<?php

namespace DEPI\AlumnosProyectosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
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
        
        return $this->render('AlumnosProyectosBundle:AlumnosProyectos:index.html.twig', 
                              array('alumnosenproyectos' => $alumnosenproyectos));
    }
    /**
     * Creates a new AlumnosProyectos entity.
     *
     * @Route("/", name="alumnosproyectos_create")
     * @Method("POST")
     * @Template("AlumnosProyectosBundle:AlumnosProyectos:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new AlumnosProyectos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('alumnosproyectos'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a AlumnosProyectos entity.
    *
    * @param AlumnosProyectos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(AlumnosProyectos $entity)
    {
        $form = $this->createForm(new AlumnosProyectosType(), $entity, array(
            'action' => $this->generateUrl('alumnosproyectos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new AlumnosProyectos entity.
     *
     * @Route("/new", name="alumnosproyectos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AlumnosProyectos();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AlumnosProyectos entity.
     *
     * @Route("/{id}/edit", name="alumnosproyectos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlumnosProyectosBundle:AlumnosProyectos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AlumnosProyectos entity.');
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
    * Creates a form to edit a AlumnosProyectos entity.
    *
    * @param AlumnosProyectos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AlumnosProyectos $entity)
    {
        $form = $this->createForm(new AlumnosProyectosType(), $entity, array(
            'action' => $this->generateUrl('alumnosproyectos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing AlumnosProyectos entity.
     *
     * @Route("/{id}", name="alumnosproyectos_update")
     * @Method("PUT")
     * @Template("AlumnosProyectosBundle:AlumnosProyectos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlumnosProyectosBundle:AlumnosProyectos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AlumnosProyectos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('alumnosproyectos'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AlumnosProyectos entity.
     *
     * @Route("/{id}", name="alumnosproyectos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AlumnosProyectosBundle:AlumnosProyectos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AlumnosProyectos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('alumnosproyectos'));
    }

    /**
     * Creates a form to delete a AlumnosProyectos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('alumnosproyectos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
