<?php

namespace DEPI\InvestigadorProyectoBundle\Entity;

use Doctrine\ORM\EntityRepository;

class InvestigadorProyectoRepository extends EntityRepository
{
	public function findInvestigadorProyecto()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('invpro.id', 
			         'investigador.nombre, investigador.id idInvestigador, investigador.apellidoPaterno, investigador.apellidoMaterno', 
			         'proyecto.nombreCorto')
		    ->from('InvestigadorProyectoBundle:InvestigadorProyecto', 'invpro')
		    ->Join('invpro.investigadores', 'investigador')
		    ->Join('invpro.proyecto', 'proyecto');

		return $dql->getQuery()->getResult();
	}
}