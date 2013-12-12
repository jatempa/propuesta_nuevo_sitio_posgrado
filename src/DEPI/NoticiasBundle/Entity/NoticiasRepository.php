<?php

namespace DEPI\NoticiasBundle\Entity;

use Doctrine\ORM\EntityRepository;

class NoticiasRepository extends EntityRepository
{
	public function findNoticias()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('n.contenido, n.fechaPublicacion, n.rutaDocumento')
		    ->from('NoticiasBundle:Noticias', 'n')
		    ->orderBy('n.fechaPublicacion', 'DESC')
		    ->setMaxResults(4);

		return $dql->getQuery()->getResult();
	}
}