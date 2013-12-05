<?php

namespace DEPI\AlumnosProyectosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AlumnosProyectosRepository extends EntityRepository
{
	public function findAlumnosConProyecto()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('ap', 
			         'alumno.id, alumno.noControl, alumno.nombre nom_alum, alumno.apellidoPaterno, alumno.apellidoMaterno', 
			         'proyecto.id, proyecto.nombreCorto', 
			         'posgrado.id, posgrado.nombre nom_posg')
		    ->from('AlumnosProyectosBundle:AlumnosProyectos', 'ap')
		    ->Join('ap.alumno', 'alumno')
		    ->Join('ap.proyecto', 'proyecto')
		    ->Join('ap.posgrado', 'posgrado');

		return $dql->getQuery()->getResult();
	}
}