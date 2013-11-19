<?php

namespace DEPI\AlumnosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AlumnosRepository extends EntityRepository
{
	public function findAlumnos()
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->select('a')
		    ->from('AlumnosBundle:Alumnos', 'a');

		return $dql->getQuery()->getResult();
	}

	public function findAlumno($noControl)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->select('a')
		    ->from('AlumnosBundle:Alumnos', 'a')
		    ->where('a.noControl = :noControl');
		
		$consulta = $dql->getQuery();
		$consulta -> setParameter('noControl', $noControl);

		return  $consulta->getSingleResult();
	}
}