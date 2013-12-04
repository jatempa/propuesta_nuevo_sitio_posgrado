<?php

namespace DEPI\AlumnosProyectosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AlumnosProyectosRepository extends EntityRepository
{
	public function findAlumnosConProyecto()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('ap', 'alumno', 'proyecto', 'posgrado')
		    ->from('AlumnosProyectosBundle:AlumnosProyectos', 'ap')
		    ->Join('ap.alumno', 'alumno')
		    ->Join('ap.proyecto', 'proyecto')
		    ->Join('ap.posgrado', 'posgrado');

		return $dql->getQuery()->getResult();
	}

	public function findDatosAlumnoProyecto($id)
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('ap', 'alumno', 'proyecto', 'posgrado')
		    ->from('AlumnosProyectosBundle:AlumnosProyectos', 'ap')
		    ->Join('ap.alumno', 'alumno')
		    ->Join('ap.proyecto', 'proyecto')
		    ->Join('ap.posgrado', 'posgrado')
		    ->where('ap.id = :id_alumnoproyecto' );
		$consulta = $dql->getQuery();
		$consulta -> setParameter('id_alumnoproyecto', $id);

		return  $consulta->getSingleResult();
	}
}