<?php

namespace DEPI\AlumnosProyectosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlumnosProyectos
 *
 * @ORM\Table(name="alumnosproyectos")
 * @ORM\Entity(repositoryClass="DEPI\AlumnosProyectosBundle\Entity\AlumnosProyectosRepository")
 */
class AlumnosProyectos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** @ORM\ManyToOne(targetEntity="DEPI\AlumnosBundle\Entity\Alumnos") 
     *  @ORM\JoinColumn(name="alumno", referencedColumnName="id")
     */
    private $alumno;

    /** @ORM\ManyToOne(targetEntity="DEPI\ProyectosBundle\Entity\Proyectos") 
     *  @ORM\JoinColumn(name="proyecto", referencedColumnName="id")
     */
    private $proyecto;

    /** @ORM\ManyToOne(targetEntity="DEPI\PosgradosBundle\Entity\Posgrados") 
     *  @ORM\JoinColumn(name="posgrado", referencedColumnName="id")
     */
    private $posgrado;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set alumnos
     *
     * @param \DEPI\AlumnosBundle\Entity\Alumnos
     * @return AlumnosProyectos
     */
    public function setAlumno(\DEPI\AlumnosBundle\Entity\Alumnos $alumno)
    {
        $this->alumno = $alumno;
    }

    /**
     * Get alumno
     *
     * @return \DEPI\AlumnosBundle\Entity\Alumnos
     */
    public function getAlumno()
    {
        return $this->alumno;
    }

    /**
     * Set proyecto
     *
     * @param \DEPI\ProyectosBundle\Entity\Proyectos
     * @return AlumnosProyectos
     */
    public function setProyecto(\DEPI\ProyectosBundle\Entity\Proyectos $proyecto)
    {
        $this->proyecto = $proyecto;
    }

    /**
     * Get proyecto
     *
     * @return \DEPI\ProyectosBundle\Entity\Proyectos 
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }

    /**
     * Set posgrado
     *
     * @param \DEPI\PosgradosBundle\Entity\Posgrados
     * @return Posgrados
     */
    public function setPosgrado(\DEPI\PosgradosBundle\Entity\Posgrados $posgrado)
    {
        $this->posgrado = $posgrado;
    }

    /**
     * Get posgrado
     *
     * @return \DEPI\PosgradosBundle\Entity\Posgrados
     */
    public function getPosgrado()
    {
        return $this->posgrado;
    }
}
