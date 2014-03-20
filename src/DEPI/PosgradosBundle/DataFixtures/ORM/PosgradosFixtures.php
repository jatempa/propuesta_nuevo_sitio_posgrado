<?php

namespace DEPI\PosgradosBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\PosgradosBundle\Entity\Posgrados;

class PosgradosFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $posgrados = array(
            array('nombre' => 'Maestría en Ingeniería Electrónica',
                  'objetivoGeneral' => 'Lorem ipsum dolor sit amet, adipisicing elit.',
                  'clave' => '34234'),
            array('nombre' => 'Maestría en Ciencias Matemáticas',
                  'objetivoGeneral' => 'Lorem ipsum dolor sit amet, adipisicing elit.',
                  'clave' => '523234'),
            array('nombre' => 'Posgrado en Astrofísica',
                  'objetivoGeneral' => 'Lorem ipsum dolor sit amet, adipisicing elit.',
                  'clave' => '3453366'),
            array('nombre' => 'Posgrado en Ciencias Físicas',
                  'objetivoGeneral' => 'Lorem ipsum dolor sit amet, adipisicing elit.',
                  'clave' => '6575675'),
            array('nombre' => 'Maestría en Ciencias Médicas',
                  'objetivoGeneral' => 'Lorem ipsum dolor sit amet, adipisicing elit.',
                  'clave' => '2342435'),
            array('nombre' => 'Maestría en Ciencias Químicas',
                  'objetivoGeneral' => 'Lorem ipsum dolor sit amet, adipisicing elit.',
                  'clave' => '4634634'),
            array('nombre' => 'Maestría en Ciencias de la Producción',
                  'objetivoGeneral' => 'Lorem ipsum dolor sit amet, adipisicing elit.',
                  'clave' => '346364'),
            array('nombre' => 'Posgrado en Ciencia e Ingeniería de Materiales',
                  'objetivoGeneral' => 'Lorem ipsum dolor sit amet, adipisicing elit.',
                  'clave' => '74546543'),
        );

        foreach ($posgrados as $posgrado) {
            $entidad = new Posgrados();
            $entidad->setNombre($posgrado['nombre']);
            $entidad->setObjetivoGeneral($posgrado['objetivoGeneral']);
            $entidad->setClave($posgrado['clave']);
            $manager->persist($entidad);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 7; // the order in which fixtures will be loaded
    }
}
