<?php

namespace DEPI\AreasBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AreasRepository extends EntityRepository
{
	public function deleteAreas($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('AreasBundle:Areas', 'a')
		    ->where('a.id = :id_areas' );
 		$dql->setParameter('id_areas', $id);

		return $dql->getQuery()->getResult();
	}
}