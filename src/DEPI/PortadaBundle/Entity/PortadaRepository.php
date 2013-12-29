<?php

namespace DEPI\PortadaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PortadaRepository extends EntityRepository
{
	public function findImagenesBanner()
	{
		$fechaPublicacion = new \DateTime('today');

		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('b.imagenBanner, b.fechaPublicacion')
		    ->from('PortadaBundle:Portada', 'b')
		    ->orderBy('b.fechaPublicacion', 'DESC')
		    ->where('b.fechaPublicacion <= :fecha')
		    ->setMaxResults(10);

		$dql->setParameter('fecha', $fechaPublicacion);

		return $dql->getQuery()->getResult();
	}

	public function deletePortada($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('PortadaBundle:Portada', 'p')
		    ->where('p.id = :id_portada' );
 		$dql->setParameter('id_portada', $id);

		return $dql->getQuery()->getResult();
	}
}