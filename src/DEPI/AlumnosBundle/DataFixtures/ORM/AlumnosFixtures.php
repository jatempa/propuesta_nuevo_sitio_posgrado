<?php

namespace DEPI\AlumnosBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\AlumnosBundle\Entity\Alumnos;

class AlumnosFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $alumnos = array(
            array('no_control' => '06490415', 
                  'nombre' => 'Alfonso'
                  'apellido_paterno' => 'Gomez'
                  'apellido_materno' => 'Espinoza'
                  'email' => 'agomez@itmexicali.edu.mx'
                  'telefono' => '6861236545'),

            array('no_control' => '08490465', 
                  'nombre' => 'Alonso'
                  'apellido_paterno' => 'Perez'
                  'apellido_materno' => 'Espinoza'
                  'email' => 'aperez@itmexicali.edu.mx'
                  'telefono' => '6861298575'),

            array('no_control' => '07490628', 
                  'nombre' => 'Guadalupe'
                  'apellido_paterno' => 'Jimenez'
                  'apellido_materno' => 'Rojas'
                  'email' => 'gjimenez@itmexicali.edu.mx'
                  'telefono' => '6869546545'),

            array('no_control' => '09490184', 
                  'nombre' => 'Leoncia'
                  'apellido_paterno' => 'Bedoya'
                  'apellido_materno' => 'Castillo'
                  'email' => 'lbeyoda@itmexicali.edu.mx'
                  'telefono' => '6862545546'),

            array('no_control' => '03490654', 
                  'nombre' => 'Luz Marina'
                  'apellido_paterno' => 'Bedregal'
                  'apellido_materno' => 'Benavides'
                  'email' => 'lbedregal@itmexicali.edu.mx'
                  'telefono' => '6861346546'),

            array('no_control' => '09490954', 
                  'nombre' => 'Cielito Mercedes'
                  'apellido_paterno' => 'Calle'
                  'apellido_materno' => 'Betancourt'
                  'email' => 'ccalle@itmexicali.edu.mx'
                  'telefono' => '6861346546'),

            array('no_control' => '09490412', 
                  'nombre' => 'Santiago'
                  'apellido_paterno' => 'Mamani'
                  'apellido_materno' => 'Uchasara'
                  'email' => 'smamani@itmexicali.edu.mx'
                  'telefono' => '6861156540'),

            array('no_control' => '09490412', 
                  'nombre' => 'Monica'
                  'apellido_paterno' => 'Zapata'
                  'apellido_materno' => 'Chang'
                  'email' => 'mzapata@itmexicali.edu.mx'
                  'telefono' => '6861546030')
        );

        foreach ($alumnos as $alumno) {
            $entidad = new Alumnos();
            $entidad->setNoControl($alumno['no_control']);
            $entidad->setNombre($alumno['nombre']);
            $entidad->setApellidoPaterno($alumno['apellido_paterno']);
            $entidad->setApellidoMaterno($alumno['apellido_materno']);
            $entidad->setEmail($alumno['email']);
            $entidad->setTelefono($alumno['telefono']);
            $manager->persist($entidad);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}
