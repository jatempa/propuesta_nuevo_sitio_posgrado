<?php

namespace DEPI\ProyectosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\ProyectosBundle\Entity\Proyectos;
use DEPI\ProyectosBundle\Form\ProyectosType;

/**
 * Proyectos_Public controller.
 *
 * @Route("/proyectos_public")
 */
class ProyectosPublicController extends Controller
{

    /**
     * Lists all Proyectos entities.
     *
     * @Route("/", name="proyectos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProyectosBundle:Proyectos')->findAll();

        return $this->render('ProyectosBundle:Proyectos:index_public.html.twig', array('entities' => $entities));
    }

    /**
     * Finds and displays a Proyectos entity.
     *
     * @Route("/{id}", name="proyectos_show_public")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectosBundle:Proyectos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyectos entity.');
        }

        //$deleteForm = $this->createDeleteForm($id);
        return $this->render('ProyectosBundle:Proyectos:show_public.html.twig', array('entity' => $entity));
        //return array(
        //    'entity'      => $entity,
        //    'delete_form' => $deleteForm->createView(),
        //);
    }
        /**
     * Creates a form to delete a Proyectos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proyectos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
