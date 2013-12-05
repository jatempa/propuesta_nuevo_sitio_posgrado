<?php

namespace DEPI\PosgradoAlumnosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosgradoAlumnos
 *
 * @ORM\Table()
 * @ORM\Entity
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

    /**
     * @var integer
     *
     * @ORM\Column(name="posgrado", type="integer")
     */
    private $posgrado;

    /**
     * @var integer
     *
     * @ORM\Column(name="alumno", type="integer")
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
     * @param integer $posgrado
     * @return PosgradoAlumnos
     */
    public function setPosgrado($posgrado)
    {
        $this->posgrado = $posgrado;
    
        return $this;
    }

    /**
     * Get posgrado
     *
     * @return integer 
     */
    public function getPosgrado()
    {
        return $this->posgrado;
    }

    /**
     * Set alumno
     *
     * @param integer $alumno
     * @return PosgradoAlumnos
     */
    public function setAlumno($alumno)
    {
        $this->alumno = $alumno;
    
        return $this;
    }

    /**
     * Get alumno
     *
     * @return integer 
     */
    public function getAlumno()
    {
        return $this->alumno;
    }
}
