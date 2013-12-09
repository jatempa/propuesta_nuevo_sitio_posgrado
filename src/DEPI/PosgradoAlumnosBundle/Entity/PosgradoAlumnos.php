<?php

namespace DEPI\PosgradoAlumnosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosgradoAlumnos
 *
 * @ORM\Table(name="posgradoalumnos")
 * @ORM\Entity(repositoryClass="DEPI\PosgradoAlumnosBundle\Entity\PosgradoAlumnosRepository")
 */
class PosgradoAlumnos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** @ORM\ManyToOne(targetEntity="DEPI\PosgradosBundle\Entity\Posgrados") 
     *  @ORM\JoinColumn(name="posgrado", referencedColumnName="id")
     */
    private $posgrado;

    /** @ORM\ManyToOne(targetEntity="DEPI\AlumnosBundle\Entity\Alumnos") 
     *  @ORM\JoinColumn(name="alumno", referencedColumnName="id")
     */
    private $alumno;


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
     * Set posgrado
     *
     * @param \DEPI\PosgradosBundle\Entity\Posgrados $posgrado
     * @return PosgradoAlumnos
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

    /**
     * Set alumnos
     *
     * @param \DEPI\AlumnosBundle\Entity\Alumnos
     * @return PosgradoAlumnos
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
}
