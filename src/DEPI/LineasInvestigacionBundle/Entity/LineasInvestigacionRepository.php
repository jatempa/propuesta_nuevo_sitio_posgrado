<?php

namespace DEPI\LineasInvestigacionBundle\Entity;

use Doctrine\ORM\EntityRepository;

class LineasInvestigacionRepository extends EntityRepository
{
	public function deleteLineasInvestigacion($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('LineasInvestigacionBundle:LineasInvestigacion', 'li')
		    ->where('li.id = :id_lineasinvestigacion' );
 		$dql->setParameter('id_lineasinvestigacion', $id);

		return $dql->getQuery()->getResult();
	}
}