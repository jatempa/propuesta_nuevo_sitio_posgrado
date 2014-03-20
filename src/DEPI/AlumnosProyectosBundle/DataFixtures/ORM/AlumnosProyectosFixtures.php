<?php

namespace DEPI\AlumnosProyectosBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\AlumnosProyectosBundle\Entity\AlumnosProyectos;

class AlumnosProyectosFixtures extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $manager)
  {
  	$proyecto_a = $manager->getRepository('ProyectosBundle:Proyectos')->find(1);
  	$proyecto_b = $manager->getRepository('ProyectosBundle:Proyectos')->find(2);
  	$proyecto_c = $manager->getRepository('ProyectosBundle:Proyectos')->find(3);
  	$proyecto_d = $manager->getRepository('ProyectosBundle:Proyectos')->find(4);

  	$alumnos_a_1 = $manager->getRepository('AlumnosBundle:Alumnos')->find(1);
  	$alumnos_a_2 = $manager->getRepository('AlumnosBundle:Alumnos')->find(2);
  	$alumnos_b_1 = $manager->getRepository('AlumnosBundle:Alumnos')->find(3);
  	$alumnos_b_2 = $manager->getRepository('AlumnosBundle:Alumnos')->find(4);
    $alumnos_c_1 = $manager->getRepository('AlumnosBundle:Alumnos')->find(5);
  	$alumnos_c_2 = $manager->getRepository('AlumnosBundle:Alumnos')->find(6);
    $alumnos_d_1 = $manager->getRepository('AlumnosBundle:Alumnos')->find(7);
  	$alumnos_d_2 = $manager->getRepository('AlumnosBundle:Alumnos')->find(8);

    $entidad = new AlumnosProyectos();
    $entidad->setAlumno($alumnos_a_1);
    $entidad->setProyecto($proyecto_a);
    $manager->persist($entidad);

    $entidad = new AlumnosProyectos();
    $entidad->setAlumno($alumnos_a_2);
    $entidad->setProyecto($proyecto_a);
    $manager->persist($entidad);

    $entidad = new AlumnosProyectos();
    $entidad->setAlumno($alumnos_b_1);
    $entidad->setProyecto($proyecto_b);
    $manager->persist($entidad);

    $entidad = new AlumnosProyectos();
    $entidad->setAlumno($alumnos_b_2);
    $entidad->setProyecto($proyecto_b);
    $manager->persist($entidad);

    $entidad = new AlumnosProyectos();
    $entidad->setAlumno($alumnos_c_1);
    $entidad->setProyecto($proyecto_c);
    $manager->persist($entidad);

    $entidad = new AlumnosProyectos();
    $entidad->setAlumno($alumnos_c_2);
    $entidad->setProyecto($proyecto_c);
    $manager->persist($entidad);

    $entidad = new AlumnosProyectos();
    $entidad->setAlumno($alumnos_d_1);
    $entidad->setProyecto($proyecto_d);
    $manager->persist($entidad); 

    $entidad = new AlumnosProyectos();
    $entidad->setAlumno($alumnos_d_2);
    $entidad->setProyecto($proyecto_d);
    $manager->persist($entidad);
    $manager->flush();
  }
  
  public function getOrder()
  {
      return 8; // the order in which fixtures will be loaded
  }
}
