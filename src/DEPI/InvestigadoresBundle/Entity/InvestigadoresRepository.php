<?php

namespace DEPI\AlumnosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class InvestigadoresRepository extends EntityRepository
{
	public function findInvestigadores()
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->select('a')
		    ->from('InvestigadoresBundle:Investigadores', 'a');

		return $dql->getQuery()->getResult();
	}
}