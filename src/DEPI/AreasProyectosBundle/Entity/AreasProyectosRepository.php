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
			         'areas.id, areas.nombre nom_area',
			         'proyectos.id, proyectos.nombreCorto', 
			         'posgrado.id, posgrado.nombre nom_posg')
		    ->from('AreasProyectosBundle:AreasProyectos', 'areaspro')
		    ->Join('areaspro.area', 'areas')
		    ->Join('areaspro.proyecto', 'proyectos')
		    ->Join('areaspro.posgrado', 'posgrado');

		return $dql->getQuery()->getResult();
	}
}