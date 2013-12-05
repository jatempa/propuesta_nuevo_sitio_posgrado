<?php

namespace DEPI\PosgradoAlumnosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PosgradoAlumnosRepository extends EntityRepository
{
	public function findPosgradoAlumnos()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('posgalu', 
			         'posgrado.id, posgrado.nombre nom_posgrado',
			         'alumnos.id, alumnos.nombre, alumnos.apellidoPaterno, alumnos.apellidoMaterno')
		    ->from('PosgradoAlumnosBundle:PosgradoAlumnos', 'posgalu')
		    ->Join('posgalu.posgrado', 'posgrado')
		    ->Join('posgalu.alumnos', 'alumnos');

		return $dql->getQuery()->getResult();
	}
}