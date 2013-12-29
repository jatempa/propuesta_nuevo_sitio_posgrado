<?php

namespace DEPI\AreasProyectosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AreasProyectosRepository extends EntityRepository
{
	public function findAreasProyectos()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('areaspro.id', 
			         'areas.nombre',
			         'proyectos.nombreCorto')
		    ->from('AreasProyectosBundle:AreasProyectos', 'areaspro')
		    ->Join('areaspro.area', 'areas')
		    ->Join('areaspro.proyecto', 'proyectos');

		return $dql->getQuery()->getResult();
	}

	public function deleteAreasProyectos($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('AreasProyectosBundle:AreasProyectos', 'ap')
		    ->where('ap.id = :id_areasproyectos' );
 		$dql->setParameter('id_areasproyectos', $id);

		return $dql->getQuery()->getResult();
	}
}