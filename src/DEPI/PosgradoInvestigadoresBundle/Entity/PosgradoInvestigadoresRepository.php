<?php

namespace DEPI\PosgradoInvestigadoresBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PosgradoInvestigadoresRepository extends EntityRepository
{
	public function findPosgradoInvestigadores()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('posginve.id', 
			         'investigadores.nombre, investigadores.apellidoPaterno, investigadores.apellidoMaterno ',
			         'posgrado.nombre nom_posgrado')
		    ->from('PosgradoInvestigadoresBundle:PosgradoInvestigadores', 'posginve')
		    ->Join('posginve.investigadores', 'investigadores')
		    ->Join('posginve.posgrado', 'posgrado');

		return $dql->getQuery()->getResult();
	}

	public function deletePosgradoInvestigadores($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('PosgradoInvestigadoresBundle:PosgradoInvestigadores', 'pa')
		    ->where('pa.id = :id_posgradoinvestigadores' );
 		$dql->setParameter('id_posgradoinvestigadores', $id);

		return $dql->getQuery()->getResult();
	}
}