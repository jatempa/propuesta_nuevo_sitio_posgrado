<?php

namespace DEPI\InvestigadoresProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvestigadoresProyecto
 *
 * @ORM\Table(name="investigadoresProyecto")
 * @ORM\Entity(repositoryClass="DEPI\InvestigadoresProyectoBundle\Entity\InvestigadoresProyectoRepository")
 */
class InvestigadoresProyecto
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
    private $investigador;

    /** @ORM\ManyToOne(targetEntity="DEPI\ProyectosBundle\Entity\Proyectos") 
     *  @ORM\JoinColumn(name="proyecto", referencedColumnName="id")
     */
    private $proyecto;

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
     * Set Investigadores
     *
     * @param \DEPI\InvestigadoresBundle\Entity\Investigadores
     * @return InvestigadoresProyecto
     */
    public function setInvestigadores(\DEPI\InvestigadoresBundle\Entity\Investigadores $investigador)
    {
        $this->investigadores = $investigador;
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
     * @return InvestigadoresProyecto
     */
    public function setProyecto(\DEPI\ProyectosBundle\Entity\Proyectos $proyecto)
    {
        $this->proyecto = $proyecto;
    }

    /**
     * Get Proyectos
     *
     * @return \DEPI\ProyectosBundle\Entity\Proyectos
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }
}
