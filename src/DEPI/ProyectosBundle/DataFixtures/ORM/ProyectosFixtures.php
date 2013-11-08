<?php

namespace DEPI\ProyectosBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\ProyectosBundle\Entity\Proyectos;

class ProyectosFixtures extends AbstractFixture implements OrderedFixtureInterface
{
     public function load(ObjectManager $manager)
  {

        $proyectos = array(
            array('clave_itm' => 'Itm04490259mxl',
                  'clave_conacyt' => 'Conacyt0440259mxl',
                  'clave_dgest' => 'Dgest0440259mxl',
                  'nombre_corto' => 'Proyecto computacion obicua',
                  'nombre_completo' => 'Proyecto computacion obicua completo',
                  'objetivo_general' => 'Obtener el grado de maestria',
                  'objetivos_especificos' => 'Publicar algun articulo sobre el tema de computacion obicua',
                  'fecha_apertura' => '2013-10-29',
                  'fecha_termino' => '2014-10-29',
                  'status' => '1'),
            array('clave_itm' => 'Itm04490260mxl',
                  'clave_conacyt' => 'Conacyt0440260mxl',
                  'clave_dgest' => 'Dgest0440260mxl',
                  'nombre_corto' => 'Proyecto senales digitales',
                  'nombre_completo' => 'Proyecto senales digitales completo',
                  'objetivo_general' => 'Obtener el grado de maestria',
                  'objetivos_especificos' => 'Publicar algun articulo sobre el tema de senales digitales',
                  'fecha_apertura' => '2013-10-29',
                  'fecha_termino' => '2014-10-29',
                  'status' => '1'),
            array('clave_itm' => 'Itm04490261mxl',
                  'clave_conacyt' => 'Conacyt0440261mxl',
                  'clave_dgest' => 'Dgest0440261mxl',
                  'nombre_corto' => 'Proyecto redes inalambricas',
                  'nombre_completo' => 'Proyecto redes inalambricas completo',
                  'objetivo_general' => 'Obtener el grado de maestria',
                  'objetivos_especificos' => 'Publicar algun articulo sobre el tema de redes inalambricas',
                  'fecha_apertura' => '2013-10-29',
                  'fecha_termino' => '2014-10-29',
                  'status' => '0'),
            array('clave_itm' => 'Itm04490262mxl',
                  'clave_conacyt' => 'Conacyt0440262mxl',
                  'clave_dgest' => 'Dgest0440262mxl',
                  'nombre_corto' => 'Proyecto sistemas distribuidos',
                  'nombre_completo' => 'Proyecto sistemas distribuidos completo',
                  'objetivo_general' => 'Obtener el grado de maestria',
                  'objetivos_especificos' => 'Publicar algun articulo sobre el tema de sistemas distribuidos',
                  'fecha_apertura' => '2013-10-29',
                  'fecha_termino' => '2014-10-29',
                  'status' => '1')
        );

        foreach ($proyectos as $proyecto) {
            $entidad = new Proyectos();
            $entidad->setClaveItm($proyecto['clave_itm']);
            $entidad->setClaveConacyt($proyecto['clave_conacyt']);
            $entidad->setClaveDgest($proyecto['clave_dgest']);
            $entidad->setNombreCorto($proyecto['nombre_corto']);
            $entidad->setNombreCompleto($proyecto['nombre_completo']);
            $entidad->setObjetivoGeneral($proyecto['objetivo_general']);
            $entidad->setObjetivosEspecificos($proyecto['objetivos_especificos']);
            $entidad->setFechaApertura(new \DateTime($proyecto['fecha_apertura']));
            $entidad->setFechaTermino(new \DateTime($proyecto['fecha_termino']));
            $entidad->setStatus($proyecto['status']);
            $manager->persist($entidad);
        }
        
        $manager->flush();
  }

  public function getOrder()
  {
      return 6; // the order in which fixtures will be loaded
  }
}
