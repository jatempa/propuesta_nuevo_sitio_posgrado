<?php

namespace DEPI\PosgradosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PosgradosRepository extends EntityRepository
{

	public function deletePosgrados($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('PosgradosBundle:Posgrados', 'p')
		    ->where('p.id = :id_posgrados' );
 		$dql->setParameter('id_posgrados', $id);

		return $dql->getQuery()->getResult();
	}
}