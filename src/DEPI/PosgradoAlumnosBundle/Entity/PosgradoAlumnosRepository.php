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
			         'posgrado.nombre nom_posgrado',
			         'alumno.nombre, alumno.apellidoPaterno, alumno.apellidoMaterno')
		    ->from('PosgradoAlumnosBundle:PosgradoAlumnos', 'posgalu')
		    ->Join('posgalu.posgrado', 'posgrado')
		    ->Join('posgalu.alumno', 'alumno');

		return $dql->getQuery()->getResult();
	}

	public function deletePosgradoAlumnos($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('PosgradoAlumnosBundle:PosgradoAlumnos', 'pa')
		    ->where('pa.id = :id_posgradoalumnos' );
 		$dql->setParameter('id_posgradoalumnos', $id);

		return $dql->getQuery()->getResult();
	}
}