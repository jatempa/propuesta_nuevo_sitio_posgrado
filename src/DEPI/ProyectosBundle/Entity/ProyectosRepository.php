<?php

namespace DEPI\ProyectosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ProyectosRepository extends EntityRepository
{

	public function deleteProyectos($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('ProyectosBundle:Proyectos', 'p')
		    ->where('p.id = :id_proyectos' );
 		$dql->setParameter('id_proyectos', $id);

		return $dql->getQuery()->getResult();
	}
}