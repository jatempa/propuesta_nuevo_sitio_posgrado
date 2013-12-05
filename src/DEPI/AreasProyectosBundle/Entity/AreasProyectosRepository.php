<?php

namespace DEPI\AreasProyectosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AreasProyectosRepository extends EntityRepository
{
	public function findAreasProyectos()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('areaspro', 
			         'areas.id, areas.nombre',
			         'proyectos.id, proyectos.nombreCorto')
		    ->from('AreasProyectosBundle:AreasProyectos', 'areaspro')
		    ->Join('areaspro.area', 'areas')
		    ->Join('areaspro.proyecto', 'proyectos');

		return $dql->getQuery()->getResult();
	}
}