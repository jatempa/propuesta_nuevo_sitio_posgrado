<?php

namespace DEPI\InvestigadorProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvestigadorProyecto
 *
 * @ORM\Table(name="investigadorProyecto")
 * @ORM\Entity
 */
class InvestigadorProyecto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

	/** @ORM\ManyToOne(targetEntity="DEPI\InvestigadoresBundle\Entity\Investigadores") 
     *  @ORM\JoinColumn(name="investigadores", referencedColumnName="id")
     */
    private $investigadores;

    /** @ORM\ManyToOne(targetEntity="DEPI\ProyectosBundle\Entity\Proyectos") 
     *  @ORM\JoinColumn(name="Proyectos", referencedColumnName="id")
     */
    private $Proyectos;

    /**
     * @var date
     *
     * @ORM\Column(name="fecha_creacion", type="date")
     */
    private $fecha_creacion;

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
     * Set investigadores
     *
     * @param \DEPI\InvestigadoresBundle\Entity\Investigadores
     * @return InvestigadorProyecto
     */
    public function setInvestigadores(\DEPI\InvestigadorProyectoBundle\Entity\Investigadores $investigadores)
    {
        $this->investigadores = $Investigadores;
    }

    /**
     * Get Investigadores
     *
     * @return \DEPI\InvestigadoresBundle\Entity\Investigadores
     */
    public function getInvestigadores()
    {
        return $this->investigadores;
    }

    /**
     * Set Proyectos
     *
     * @param \DEPI\ProyectosBundle\Entity\Proyectos
     * @return InvestigadorProyecto
     */
    public function setProyectos(\DEPI\InvestigadorProyectoBundle\Entity\Proyectos $Proyectos)
    {
        $this->Proyectos = $Proyectos;
    }

    /**
     * Get Investigadores
     *
     * @return \DEPI\ProyectosBundle\Entity\Proyectos
     */
    public function getProyectos()
    {
        return $this->Proyectos;
    }

    /**
     * Set fecha_creacion
     *
     * @param date $fecha_creacion
     * @return Alumno
     */
    public function setfecha_creacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
    
        return $this;
    }

    /**
     * Get fecha_creacion
     *
     * @return date 
     */
    public function getfecha_creacion()
    {
        return $this->fecha_creacion;
    }

    public function __toString()
    {
        return $this->getfecha_creacion();
    }
}
