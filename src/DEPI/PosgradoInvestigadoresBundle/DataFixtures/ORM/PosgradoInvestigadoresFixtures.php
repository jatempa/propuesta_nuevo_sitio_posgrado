<?php

namespace DEPI\PosgradoInvestigadoresBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\PosgradoInvestigadoresBundle\Entity\PosgradoInvestigadores;

class PosgradoInvestigadoresFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $posgrado = $manager->getRepository('PosgradosBundle:Posgrados')->find(1);

        $investigadores_a_1 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(1);
        $investigadores_a_2 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(2);
        $investigadores_b_1 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(3);
        $investigadores_b_2 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(4);
        $investigadores_c_1 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(5);
        $investigadores_c_2 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(6);
        $investigadores_d_1 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(7);
        $investigadores_d_2 = $manager->getRepository('InvestigadoresBundle:Investigadores')->find(8);

        $entidad = new PosgradoInvestigadores();
        $entidad->setInvestigadores($investigadores_a_1);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);

        $entidad = new PosgradoInvestigadores();
        $entidad->setInvestigadores($investigadores_a_2);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);

        $entidad = new PosgradoInvestigadores();
        $entidad->setInvestigadores($investigadores_b_1);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);

        $entidad = new PosgradoInvestigadores();
        $entidad->setInvestigadores($investigadores_b_2);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);

        $entidad = new PosgradoInvestigadores();
        $entidad->setInvestigadores($investigadores_c_1);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);

        $entidad = new PosgradoInvestigadores();
        $entidad->setInvestigadores($investigadores_c_2);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);

        $entidad = new PosgradoInvestigadores();
        $entidad->setInvestigadores($investigadores_d_1);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad); 

        $entidad = new PosgradoInvestigadores();
        $entidad->setInvestigadores($investigadores_d_2);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);
        $manager->flush();
    }

    public function getOrder()
    {
        return 13; // the order in which fixtures will be loaded
    }
}