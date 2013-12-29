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

	public function deletePosgradoAreas($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('PosgradoAreasBundle:PosgradoAreas', 'pa')
		    ->where('pa.id = :id_posgradoareas' );
 		$dql->setParameter('id_posgradoareas', $id);

		return $dql->getQuery()->getResult();
	}
}