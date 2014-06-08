<?php

namespace DEPI\UsuarioBundle\Entity;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository
{
	public function findUsuario()
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->select('u')
		    ->from('UsuarioBundle:Usuario', 'u');

		return $dql->getQuery()->getResult();
	}

	public function deleteUsuario($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('UsuarioBundle:Usuario', 'u')
		    ->where('u.id = :id_usuario' );
 		$dql->setParameter('id_usuario', $id);

		return $dql->getQuery()->getResult();
	}
}