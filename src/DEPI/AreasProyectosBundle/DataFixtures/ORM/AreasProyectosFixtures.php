<?php

namespace DEPI\AreasProyectosBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\AreasProyectosBundle\Entity\AreasProyectos;

class AreasProyectosFixtures extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $manager)
  {
  	$proyecto_a = $manager->getRepository('ProyectosBundle:Proyectos')->find(1);
  	$proyecto_b = $manager->getRepository('ProyectosBundle:Proyectos')->find(2);
  	$proyecto_c = $manager->getRepository('ProyectosBundle:Proyectos')->find(3);
  	$proyecto_d = $manager->getRepository('ProyectosBundle:Proyectos')->find(4);

  	$area = $manager->getRepository('AreasBundle:Areas')->find(5);

    $entidad = new AreasProyectos();
    $entidad->setArea($area);
    $entidad->setProyecto($proyecto_b);
    $manager->persist($entidad);

    $area = $manager->getRepository('AreasBundle:Areas')->find(2);

    $entidad = new AreasProyectos();
    $entidad->setArea($area);
    $entidad->setProyecto($proyecto_a);
    $manager->persist($entidad);

    $entidad = new AreasProyectos();
    $entidad->setArea($area);
    $entidad->setProyecto($proyecto_c);
    $manager->persist($entidad);

    $entidad = new AreasProyectos();
    $entidad->setArea($area);
    $entidad->setProyecto($proyecto_d);
    $manager->persist($entidad);

    $manager->flush();
  }
  
  public function getOrder()
  {
      return 9; // the order in which fixtures will be loaded
  }
}
