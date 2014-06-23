<?php

namespace DEPI\AlumnosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AlumnosPublicController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $alumnos = $em->getRepository('AlumnosBundle:Alumnos')->findAlumnos();
        $alumnosconproyecto = $em->getRepository('AlumnosProyectosBundle:AlumnosProyectos')->findAlumnosConProyecto();
        $banner = $em->getRepository('PortadaBundle:Portada')->findImagenesBanner();

        $respuesta = $this->render(
            'AlumnosBundle:Alumnos:index_public.html.twig', 
            array('alumnos' => $alumnos, 'alumnosconproyecto' => $alumnosconproyecto,'banner' => $banner)
        );

        $respuesta->setMaxAge(5 * 60);

        return $respuesta;
    }
}
