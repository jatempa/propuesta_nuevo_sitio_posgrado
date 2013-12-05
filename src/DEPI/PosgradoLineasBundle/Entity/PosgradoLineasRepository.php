<?php

namespace DEPI\PosgradoLineasBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PosgradoLineasRepository extends EntityRepository
{
	public function findPosgradoLineas()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('posglin', 
			         'lineasinvestigacion.id, lineasinvestigacion.nombre nom_linea',
			         'posgrado.id, posgrado.nombre nom_posgrado')
		    ->from('PosgradoLineasBundle:PosgradoLineas', 'posglin')
		    ->Join('posglin.lineasinvestigacion', 'lineas')
		    ->Join('posglin.posgrado', 'posgrado');

		return $dql->getQuery()->getResult();
	}
}