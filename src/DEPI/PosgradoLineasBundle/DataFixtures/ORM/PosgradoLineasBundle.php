<?php

namespace DEPI\PosgradoLineasBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\PosgradoLineasBundle\Entity\PosgradoLineas;

class PosgradoLineasFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $posgrado = $manager->getRepository('PosgradosBundle:Posgrados')->find(1);

        $lineainv = $manager->getRepository('LineasInvestigacionBundle:LineasInvestigacion')->find(1);

        $entidad = new PosgradoLineas();
        $entidad->setLineasinvestigacion($lineainv);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);

        $lineainv = $manager->getRepository('LineasInvestigacionBundle:LineasInvestigacion')->find(2);

        $entidad = new PosgradoLineas();
        $entidad->setLineasinvestigacion($lineainv);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);

        $manager->flush();
    }

    public function getOrder()
    {
        return 14; // the order in which fixtures will be loaded
    }
}