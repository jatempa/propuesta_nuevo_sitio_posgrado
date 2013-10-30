<?php

namespace DEPI\InvestigadoresBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DEPI\InvestigadoresBundle\Entity\Investigadores;

class InvestigadoresFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $investigadores = array(
            array('grado' => '0', 
                  'nombre' => 'Juan Elvis'
                  'apellido_paterno' => 'Cocho'
                  'apellido_materno' => 'Farias'
                  'email' => 'jcocho@itmexicali.edu.mx'
                  'sni' => '0'
                  'telefono' => '6861212545'),

            array('grado' => '0', 
                  'nombre' => 'Marina'
                  'apellido_paterno' => 'Bonifaz'
                  'apellido_materno' => 'Espinoza'
                  'email' => 'mbonifaz@itmexicali.edu.mx'
                  'sni' => '0'
                  'telefono' => '6561298575'),

            array('grado' => '0', 
                  'nombre' => 'Celin'
                  'apellido_paterno' => 'Salcedo'
                  'apellido_materno' => 'Del pino'
                  'email' => 'csalcedo@itmexicali.edu.mx'
                  'sni' => '0'
                  'telefono' => '6469565545'),

            array('grado' => '0', 
                  'nombre' => 'Magnolia'
                  'apellido_paterno' => 'Bedoya'
                  'apellido_materno' => 'Castillo'
                  'email' => 'mbeyoda@itmexicali.edu.mx'
                  'sni' => '0'
                  'telefono' => '6862545546'),

            array('grado' => '0', 
                  'nombre' => 'Augusto'
                  'apellido_paterno' => 'Tejada'
                  'apellido_materno' => 'Benavides'
                  'email' => 'atejada@itmexicali.edu.mx'
                  'sni' => '0'
                  'telefono' => '6861986546'),

            array('grado' => '0', 
                  'nombre' => 'Mercedes'
                  'apellido_paterno' => 'Calle'
                  'apellido_materno' => 'Betancourt'
                  'email' => 'mcalle@itmexicali.edu.mx'
                  'sni' => '0'
                  'telefono' => '6861346546'),

            array('grado' => '0', 
                  'nombre' => 'Santiago'
                  'apellido_paterno' => 'Arone'
                  'apellido_materno' => 'Davila'
                  'email' => 'sarone@itmexicali.edu.mx'
                  'sni' => '0'
                  'telefono' => '6861110540'),

            array('grado' => '0', 
                  'nombre' => 'Freddy'
                  'apellido_paterno' => 'Rios'
                  'apellido_materno' => 'Lima'
                  'email' => 'frios@itmexicali.edu.mx'
                  'sni' => '0'
                  'telefono' => '6861510030')
        );

        foreach ($investigadores as $investigador) {
            $entidad = new Investigadores();
            $entidad->setGrado($investigador['grado']);
            $entidad->setNombre($investigador['nombre']);
            $entidad->setApellidoPaterno($investigador['apellido_paterno']);
            $entidad->setApellidoMaterno($investigador['apellido_materno']);
            $entidad->setEmail($investigador['email']);
            $entidad->setTelefono($investigador['telefono']);
            $entidad->setSni($investigador['sni']);
            $manager->persist($entidad);
        }
        
        $manager->flush();
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}