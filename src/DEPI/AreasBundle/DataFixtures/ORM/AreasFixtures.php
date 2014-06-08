<?php

namespace DEPI\AreasBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\AreasBundle\Entity\Areas;

class AreasFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $areas = array(
            array('nombre' => 'Ingeniería Química', 
                  'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'),
            array('nombre' => 'Ciencias de la Computación', 
                  'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'),
            array('nombre' => 'Ingeniería Bioquímica', 
                  'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'),
            array('nombre' => 'Ciencias Agropecuarias', 
                  'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'),
            array('nombre' => 'Ingeniería Eléctrica', 
                  'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'),
            array('nombre' => 'Administración, Planificación', 
                  'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.'),
            array('nombre' => 'Ingeniería Mecánica', 
                  'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.')
        );

        foreach ($areas as $area) {
            $entidad = new Areas();
            $entidad->setNombre($area['nombre']);
            $entidad->setDescripcion($area['descripcion']);
            $manager->persist($entidad);
        }
        
        $manager->flush();
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}