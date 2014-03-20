<?php

namespace DEPI\PosgradoAreasBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\PosgradoAreasBundle\Entity\PosgradoAreas;

class PosgradoAreasFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $posgrado = $manager->getRepository('PosgradosBundle:Posgrados')->find(1);
        $area = $manager->getRepository('AreasBundle:Areas')->find(2);

        $entidad = new PosgradoAreas();
        $entidad->setArea($area);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);
        $manager->flush();
    }

    public function getOrder()
    {
        return 12; // the order in which fixtures will be loaded
    }
}