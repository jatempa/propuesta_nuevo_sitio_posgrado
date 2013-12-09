<?php

namespace DEPI\PortadaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PortadaRepository extends EntityRepository
{
	public function findImagenesBanner()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('b.imagenBanner, b.fechaPublicacion')
		    ->from('PortadaBundle:Portada', 'b')
		    ->orderBy('b.fechaPublicacion', 'DESC')
		    ->setMaxResults(5);

		return $dql->getQuery()->getResult();
	}
}