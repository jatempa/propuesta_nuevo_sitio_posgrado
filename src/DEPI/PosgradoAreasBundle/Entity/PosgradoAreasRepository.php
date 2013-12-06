<?php

namespace DEPI\PosgradoAreasBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PosgradoAreasRepository extends EntityRepository
{
	public function findPosgradoAreas()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('posgarea.id', 
			         'area.nombre nom_area',
			         'posgrado.nombre nom_posgrado')
		    ->from('PosgradoAreasBundle:PosgradoAreas', 'posgarea')
		    ->Join('posgarea.area', 'area')
		    ->Join('posgarea.posgrado', 'posgrado');

		return $dql->getQuery()->getResult();
	}
}