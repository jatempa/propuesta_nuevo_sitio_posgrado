<?php

namespace DEPI\ProductosAcademicosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ProductosAcademicosRepository extends EntityRepository
{

	public function deleteProductosAcademicos($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('ProductosAcademicosBundle:ProductosAcademicos', 'pa')
		    ->where('pa.id = :id_productosacademicos' );
 		$dql->setParameter('id_productosacademicos', $id);

		return $dql->getQuery()->getResult();
	}
}