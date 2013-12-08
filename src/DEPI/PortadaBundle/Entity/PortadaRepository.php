<?php

namespace DEPI\PortadaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PortadaRepository extends EntityRepository
{
	public function findImagenesBanner()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('n.contenido, n.fechaPublicacion')
		    ->from('PortadaBundle:Portada', 'n')
		    ->orderBy('n.fechaPublicacion', 'DESC')
		    ->setMaxResults(4);

		return $dql->getQuery()->getResult();
	}
}