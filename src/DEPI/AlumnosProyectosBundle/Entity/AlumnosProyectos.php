<?php

namespace DEPI\AlumnosProyectosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlumnosProyectos
 *
 * @ORM\Table(name="alumnosproyectos")
 * @ORM\Entity
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
     *  @ORM\JoinColumn(name="idAlumno", referencedColumnName="id")
     */
    private $idAlumno;

    /** @ORM\ManyToOne(targetEntity="DEPI\ProyectosBundle\Entity\Proyectos") 
     *  @ORM\JoinColumn(name="idProyectos", referencedColumnName="id")
     */
    private $idProyecto;


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
    public function setIdAlumno(\DEPI\AlumnosBundle\Entity\Alumnos $alumnos)
    {
        $this->idAlumno = $idAlumno;
    }

    /**
     * Get idAlumno
     *
     * @return \DEPI\AlumnosBundle\Entity\Alumnos
     */
    public function getIdAlumno()
    {
        return $this->idAlumno;
    }

    /**
     * Set proyecto
     *
     * @param \DEPI\ProyectosBundle\Entity\Proyectos
     * @return AlumnosProyectos
     */
    public function setIdProyecto(\DEPI\ProyectosBundle\Entity\Proyectos $idProyecto)
    {
        $this->idProyecto = $idProyecto;
    }

    /**
     * Get idProyecto
     *
     * @return \DEPI\ProyectosBundle\Entity\Proyectos 
     */
    public function getIdProyecto()
    {
        return $this->idProyecto;
    }

    public function __toString()
    {
        return $this->getRol();
    }
}
