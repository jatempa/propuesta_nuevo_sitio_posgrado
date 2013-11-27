<?php

namespace DEPI\AlumnosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DEPI\AlumnosBundle\Entity\Alumnos;
use DEPI\AlumnosBundle\Form\AlumnosType;

/**
 * Alumnos_Public controller.
 *
 * @Route("/alumnos_public")
 */
class AlumnosPublicController extends Controller
{

    /**
     * Lists all Alumnos entities.
     *
     * @Route("/", name="alumnos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AlumnosBundle:Alumnos')->findAll();

        return $this->render('AlumnosBundle:Alumnos:index_public.html.twig', array('entities' => $entities));
    }

    /**
     * Finds and displays a Alumnos entity.
     *
     * @Route("/{id}", name="alumnos_show_public")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AlumnosBundle:Alumnos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alumnos entity.');
        }

        //$deleteForm = $this->createDeleteForm($id);
        return $this->render('AlumnosBundle:Alumnos:show_public.html.twig', array('entity' => $entity));
        //return array(
        //    'entity'      => $entity,
        //    'delete_form' => $deleteForm->createView(),
        //);
    }
        /**
     * Creates a form to delete a Alumnos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('alumnos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
