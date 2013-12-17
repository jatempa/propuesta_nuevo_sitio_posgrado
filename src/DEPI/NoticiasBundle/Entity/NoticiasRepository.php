<?php

namespace DEPI\NoticiasBundle\Entity;

use Doctrine\ORM\EntityRepository;

class NoticiasRepository extends EntityRepository
{
	public function findNoticias()
	{
		$fechaPublicacion = new \DateTime('today');

		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('n.id, n.titulo, n.contenido, n.fechaPublicacion, n.rutaDocumento')
		    ->from('NoticiasBundle:Noticias', 'n')
		    ->orderBy('n.fechaPublicacion', 'DESC')
		    ->where('n.fechaPublicacion <= :fecha')
		    ->setMaxResults(4);

        $dql->setParameter('fecha', $fechaPublicacion);

		return $dql->getQuery()->getResult();
	}
}