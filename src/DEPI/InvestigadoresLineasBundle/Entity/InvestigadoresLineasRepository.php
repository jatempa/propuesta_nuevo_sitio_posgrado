<?php

namespace DEPI\InvestigadoresLineasBundle\Entity;

use Doctrine\ORM\EntityRepository;

class InvestigadoresLineasRepository extends EntityRepository
{
	public function findInvestigadoresLineas()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('invlin', 'investigador', 'linea', 'posgrado')
		    ->from('InvestigadoresLineasBundle:InvestigadoresLineas', 'invlin')
		    ->Join('invlin.investigadores', 'investigador')
		    ->Join('invlin.lineasinvestigacion', 'linea');

		return $dql->getQuery()->getResult();
	}
}