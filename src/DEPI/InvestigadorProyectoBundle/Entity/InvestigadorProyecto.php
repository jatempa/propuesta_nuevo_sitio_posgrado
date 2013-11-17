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
     *  @ORM\JoinColumn(name="proyectos", referencedColumnName="id")
     */
    private $proyectos;

    /**
     * @var date
     *
     * @ORM\Column(name="fecha_creacion", type="date")
     */
    private $fechaCreacion;

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
    public function setInvestigadores(\DEPI\InvestigadoresBundle\Entity\Investigadores $investigadores)
    {
        $this->investigadores = $investigadores;
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
    public function setProyectos(\DEPI\ProyectosBundle\Entity\Proyectos $proyectos)
    {
        $this->proyectos = $proyectos;
    }

    /**
     * Get Investigadores
     *
     * @return \DEPI\ProyectosBundle\Entity\Proyectos
     */
    public function getProyectos()
    {
        return $this->proyectos;
    }

    /**
     * Set fecha_creacion
     *
     * @param date $fecha_creacion
     * @return InvestigadorProyecto
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    
        return $this;
    }

    /**
     * Get fecha_creacion
     *
     * @return date 
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }
}
