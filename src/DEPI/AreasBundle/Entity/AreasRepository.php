<?php

namespace DEPI\AreasBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AreasRepository extends EntityRepository
{
	public function findInformacionArea($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->select('a.id, a.nombre, a.descripcion')
		    ->from('AreasBundle:Areas', 'a')
		    ->where('a.id = :id');
		$dql->setParameter('id', $id);

		return $dql->getQuery()->getSingleResult();              
	}
}