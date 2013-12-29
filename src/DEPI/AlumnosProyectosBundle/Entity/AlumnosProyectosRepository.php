<?php

namespace DEPI\AlumnosProyectosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AlumnosProyectosRepository extends EntityRepository
{
	public function findAlumnosConProyecto()
	{
		$em = $this->getEntityManager();

		$dql = $em->createQueryBuilder();
 
		$dql->select('ap.id', 
			         'alumno.noControl, alumno.id idAlumno, alumno.nombre, alumno.apellidoPaterno, alumno.apellidoMaterno, alumno.rutaFoto', 
			         'alumno.email, proyecto.nombreCorto')
		    ->from('AlumnosProyectosBundle:AlumnosProyectos', 'ap')
		    ->Join('ap.alumno', 'alumno')
		    ->Join('ap.proyecto', 'proyecto');

		return $dql->getQuery()->getResult();
	}

	public function deleteAlumnosProyectos($id)
	{
		$em = $this->getEntityManager();
		$dql = $em->createQueryBuilder();
		$dql->delete('AlumnosProyectosBundle:AlumnosProyectos', 'ap')
		    ->where('ap.id = :id_alumnosproyectos' );
 		$dql->setParameter('id_alumnosproyectos', $id);

		return $dql->getQuery()->getResult();
	}
}