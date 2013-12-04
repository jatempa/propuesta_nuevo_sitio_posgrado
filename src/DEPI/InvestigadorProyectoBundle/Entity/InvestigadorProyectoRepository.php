<?php

namespace DEPI\InvestigadorProyectoBundle\Entity;

use Doctrine\ORM\EntityRepository;

class InvestigadorProyectoRepository extends EntityRepository
{
	public function findInvestigadorProyecto()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('invpro', 'investigador', 'proyecto')
		    ->from('InvestigadorProyectoBundle:InvestigadorProyecto', 'invpro')
		    ->Join('invpro.investigadores', 'investigador')
		    ->Join('invpro.proyecto', 'proyecto');

		return $dql->getQuery()->getResult();
	}
}