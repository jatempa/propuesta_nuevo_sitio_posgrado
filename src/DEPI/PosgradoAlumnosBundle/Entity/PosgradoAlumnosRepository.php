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

	public function deletePosgrado($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('PosgradoBundle:Posgrado', 'p')
		    ->where('p.id = :id_posgrado' );
 		$dql->setParameter('id_posgrado', $id);

		return $dql->getQuery()->getResult();
	}
}