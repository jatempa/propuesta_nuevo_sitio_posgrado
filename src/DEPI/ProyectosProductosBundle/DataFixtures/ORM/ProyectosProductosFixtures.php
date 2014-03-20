<?php

namespace DEPI\ProyectosProductosBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\ProyectosProductosBundle\Entity\ProyectosProductos;

class ProyectosProductosFixtures extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $manager)
  {
    $productoacademico = $manager->getRepository('ProductosAcademicosBundle:ProductosAcademicos')->find(8);

  	$proyecto = $manager->getRepository('ProyectosBundle:Proyectos')->find(1);

    $entidad = new ProyectosProductos();
    $entidad->setProyecto($proyecto);
    $entidad->setProductoAcademico($productoacademico);
    $entidad->setCantidad(1);
    $entidad->setFechaCumplimiento(new \DateTime('2014-06-28'));
    $entidad->setObservaciones(null);

    $manager->persist($entidad);

    $manager->flush();
  }
  
  public function getOrder()
  {
      return 15; // the order in which fixtures will be loaded
  }
}
