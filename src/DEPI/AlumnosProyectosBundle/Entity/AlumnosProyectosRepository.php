<?php

namespace DEPI\AlumnosProyectosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AlumnosProyectosRepository extends EntityRepository
{
	public function findAlumnosConProyecto()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('ap', 'alumno', 'proyecto')
		    ->from('AlumnosProyectosBundle:AlumnosProyectos', 'ap')
		    ->Join('ap.idAlumno', 'alumno')
		    ->Join('ap.idProyecto', 'proyecto');

		return $dql->getQuery()->getResult();
	}

	public function findDatosAlumnoProyecto($id)
	{
		$em = $this->getEntityManager();

		$dql = 'SELECT ap, alumno, proyecto
		        FROM AlumnosProyectosBundle:AlumnosProyectos ap
		        JOIN ap.idAlumno alumno
		        JOIN ap.idProyecto proyecto
		        WHERE ap.id = :id_alumnoproyecto';

		$consulta = $em->createQuery($dql);
		$consulta -> setParameter('id_alumnoproyecto', $id);

		return $consulta->getSingleResult();
	}
}