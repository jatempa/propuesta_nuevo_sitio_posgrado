<?php

namespace DEPI\InvestigadoresProyectosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class InvestigadoresProyectosRepository extends EntityRepository
{
	public function findInvestigadoresProyectos()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('invpro.id', 
			         'investigador.nombre, investigador.id idInvestigador, investigador.apellidoPaterno, investigador.apellidoMaterno', 
			         'proyecto.nombreCorto')
		    ->from('InvestigadoresProyectosBundle:InvestigadoresProyectos', 'invpro')
		    ->Join('invpro.investigador', 'investigador')
		    ->Join('invpro.proyecto', 'proyecto');

		return $dql->getQuery()->getResult();
	}	

	public function deleteInvestigadoresProyectos($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('InvestigadoresProyectosBundle:InvestigadoresProyectos', 'ip')
		    ->where('ip.id = :id_investigadorproyecto' );
 		$dql->setParameter('id_investigadorproyecto', $id);

		return $dql->getQuery()->getResult();
	}
}