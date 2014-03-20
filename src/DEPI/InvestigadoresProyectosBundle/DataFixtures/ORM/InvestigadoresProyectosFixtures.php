<?php

namespace DEPI\InvestigadoresProyectosBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\InvestigadoresProyectosBundle\Entity\InvestigadoresProyectos;

class InvestigadoresProyectosFixtures extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $manager)
  {
  	$proyecto_a = $manager->getRepository('ProyectosBundle:Proyectos')->find(1);
  	$proyecto_b = $manager->getRepository('ProyectosBundle:Proyectos')->find(2);
  	$proyecto_c = $manager->getRepository('ProyectosBundle:Proyectos')->find(3);
  	$proyecto_d = $manager->getRepository('ProyectosBundle:Proyectos')->find(4);

    $investigadores_a_1 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(1);
    $investigadores_a_2 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(2);
    $investigadores_b_1 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(3);
    $investigadores_b_2 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(4);
    $investigadores_c_1 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(5);
    $investigadores_c_2 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(6);
    $investigadores_d_1 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(7);
    $investigadores_d_2 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(8);

    $entidad = new InvestigadoresProyectos();
    $entidad->setInvestigador($investigadores_a_1);
    $entidad->setProyecto($proyecto_a);
    $manager->persist($entidad);

    $entidad = new InvestigadoresProyectos();
    $entidad->setInvestigador($investigadores_a_2);
    $entidad->setProyecto($proyecto_a);
    $manager->persist($entidad);

    $entidad = new InvestigadoresProyectos();
    $entidad->setInvestigador($investigadores_b_1);
    $entidad->setProyecto($proyecto_b);
    $manager->persist($entidad);

    $entidad = new InvestigadoresProyectos();
    $entidad->setInvestigador($investigadores_b_2);
    $entidad->setProyecto($proyecto_b);
    $manager->persist($entidad);

    $entidad = new InvestigadoresProyectos();
    $entidad->setInvestigador($investigadores_c_1);
    $entidad->setProyecto($proyecto_c);
    $manager->persist($entidad);

    $entidad = new InvestigadoresProyectos();
    $entidad->setInvestigador($investigadores_c_2);
    $entidad->setProyecto($proyecto_c);
    $manager->persist($entidad);

    $entidad = new InvestigadoresProyectos();
    $entidad->setInvestigador($investigadores_d_1);
    $entidad->setProyecto($proyecto_d);
    $manager->persist($entidad);

    $entidad = new InvestigadoresProyectos();
    $entidad->setInvestigador($investigadores_d_2);
    $entidad->setProyecto($proyecto_d);
    $manager->persist($entidad);

    $manager->flush();
  }
  
  public function getOrder()
  {
      return 10; // the order in which fixtures will be loaded
  }
}
