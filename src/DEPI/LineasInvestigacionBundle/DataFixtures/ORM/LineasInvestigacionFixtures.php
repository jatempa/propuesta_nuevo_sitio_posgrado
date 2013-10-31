<?php

namespace DEPI\LineasInvestigacionBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\LineasInvestigacionBundle\Entity\LineasInvestigacion;

class LineasInvestigacionFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $lineas = array(
            array('clave' => 'MM155ADAA', 
                  'nombre' => 'Computacion Ubicua',
                  'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consequat metus non libero egestas, ac gravida libero ultricies. Nullam congue.'),
            array('clave' => 'KOJ1664AS', 
                  'nombre' => 'Procesamiento digital de seniales',
                  'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consequat metus non libero egestas, ac gravida libero ultricies. Nullam congue.'),
            array('clave' => '09809ASAS', 
                  'nombre' => 'Morfologia Matematica',
                  'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consequat metus non libero egestas, ac gravida libero ultricies. Nullam congue.'),
            array('clave' => 'POKK16489', 
                  'nombre' => 'Sistemas Biomedicos',
                  'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consequat metus non libero egestas, ac gravida libero ultricies. Nullam congue.')
        );

        foreach ($lineas as $linea) {
            $entidad = new LineasInvestigacion();
            $entidad->setClave($linea['clave']);
            $entidad->setNombre($linea['nombre']);
            $entidad->setDescripcion($linea['descripcion']);
            $manager->persist($entidad);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 5; // the order in which fixtures will be loaded
    }
}