<?php

namespace DEPI\AlumnosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AlumnosRepository extends EntityRepository
{
	public function findAlumnos()
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->select('a.id, a.noControl, a.nombre, a.apellidoPaterno, a.apellidoMaterno, a.email, a.rutaFoto')
		    ->from('AlumnosBundle:Alumnos', 'a');

		return $dql->getQuery()->getResult();
	}

	public function deleteAlumnos($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('AlumnosBundle:Alumnos', 'a')
		    ->where('a.id = :id_alumnos' );
 		$dql->setParameter('id_alumnos', $id);

		return $dql->getQuery()->getResult();
	}
}