<?php

namespace DEPI\ProductosAcademicosBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\ProductosAcademicosBundle\Entity\ProductosAcademicos;

class ProductosAcademicosFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $productosacademicos = array(
            array('meta' => 'Integración de alumnos de licenciatura al proyecto'),
            array('meta' => 'Participación de alumnos residentes'),
            array('meta' => 'Artículos científicos en revista arbitrada'),
            array('meta' => 'Artículos de divulgación'),
            array('meta' => 'Memorias en extenso en congresos nacionales'),
            array('meta' => 'Memorias en extenso en congresos internacionales'),
            array('meta' => 'Tesis de licenciatura a desarrollar'),
            array('meta' => 'Tesis de maestría a desarrollar'),
            array('meta' => 'Tesis de doctorado a desarrollar'),
            array('meta' => 'Libros'),
            array('meta' => 'Capítulos de libros'),
            array('meta' => 'Patentes'),
            array('meta' => 'Prototipos'),
            array('meta' => 'Paquetes tecnológicos'),
            array('meta' => 'Informes técnicos a empresas o instituciones'),
            array('meta' => 'Otros')

        );

        foreach ($productosacademicos as $productoacademico) {
            $entidad = new ProductosAcademicos();
            $entidad->setMeta($productoacademico['meta']);
            $manager->persist($entidad);
        }
        
        $manager->flush();
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}