<?php

namespace DEPI\PosgradoAlumnosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PosgradoAlumnosRepository extends EntityRepository
{
	public function findPosgradoAlumnos()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('posgalu.id', 
			         'posgrado.id id_posgrado, posgrado.nombre nom_posgrado',
			         'alumno.id id_alumno, alumno.nombre, alumno.apellidoPaterno, alumno.apellidoMaterno')
		    ->from('PosgradoAlumnosBundle:PosgradoAlumnos', 'posgalu')
		    ->Join('posgalu.posgrado', 'posgrado')
		    ->Join('posgalu.alumno', 'alumno');

		return $dql->getQuery()->getResult();
	}
}