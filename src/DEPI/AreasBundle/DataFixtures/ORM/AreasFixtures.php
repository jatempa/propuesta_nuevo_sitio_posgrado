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
            array('nombre' => 'Ingeniería Química, Polímeros, Ingeniería Ambiental, Química', 
                  'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.'),
            array('nombre' => 'Ciencias de la Computación', 
                  'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.'),
            array('nombre' => 'Ingeniería Bioquímica, Ciencias de los Alimentos', 
                  'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.'),
            array('nombre' => 'Ciencias Agropecuarias, Ciencias del Mar', 
                  'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.'),
            array('nombre' => 'Ingeniería Eléctrica, Ingeniería Electrónica', 
                  'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.'),
            array('nombre' => 'Administración, Planificación, Desarrollo Regional, Ingeniería Administrativa, Ingeniería Industrial', 
                  'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.'),
            array('nombre' => 'Ingeniería Mecánica, Ingeniería Mecatrónica, Metalurgia, Materiales', 
                  'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.')
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