<?php

namespace DEPI\PosgradoAlumnosBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\PosgradoAlumnosBundle\Entity\PosgradoAlumnos;

class PosgradoAlumnosFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $posgrado = $manager->getRepository('PosgradosBundle:Posgrados')->find(1);

        $alumnos_a_1 = $manager->getRepository('AlumnosBundle:Alumnos')->find(1);
        $alumnos_a_2 = $manager->getRepository('AlumnosBundle:Alumnos')->find(2);
        $alumnos_b_1 = $manager->getRepository('AlumnosBundle:Alumnos')->find(3);
        $alumnos_b_2 = $manager->getRepository('AlumnosBundle:Alumnos')->find(4);
        $alumnos_c_1 = $manager->getRepository('AlumnosBundle:Alumnos')->find(5);
        $alumnos_c_2 = $manager->getRepository('AlumnosBundle:Alumnos')->find(6);
        $alumnos_d_1 = $manager->getRepository('AlumnosBundle:Alumnos')->find(7);
        $alumnos_d_2 = $manager->getRepository('AlumnosBundle:Alumnos')->find(8);

        $entidad = new PosgradoAlumnos();
        $entidad->setAlumno($alumnos_a_1);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);

        $entidad = new PosgradoAlumnos();
        $entidad->setAlumno($alumnos_a_2);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);

        $entidad = new PosgradoAlumnos();
        $entidad->setAlumno($alumnos_b_1);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);

        $entidad = new PosgradoAlumnos();
        $entidad->setAlumno($alumnos_b_2);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);

        $entidad = new PosgradoAlumnos();
        $entidad->setAlumno($alumnos_c_1);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);

        $entidad = new PosgradoAlumnos();
        $entidad->setAlumno($alumnos_c_2);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);

        $entidad = new PosgradoAlumnos();
        $entidad->setAlumno($alumnos_d_1);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad); 

        $entidad = new PosgradoAlumnos();
        $entidad->setAlumno($alumnos_d_2);
        $entidad->setPosgrado($posgrado);
        $manager->persist($entidad);
        $manager->flush();
    }

    public function getOrder()
    {
        return 11; // the order in which fixtures will be loaded
    }
}