<?php

namespace DEPI\InvestigadorProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvestigadorProyecto
 *
 * @ORM\Table(name="investigadorProyecto")
 * @ORM\Entity(repositoryClass="DEPI\InvestigadorProyectoBundle\Entity\InvestigadorProyectoRepository")
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
    public function setProyecto(\DEPI\ProyectosBundle\Entity\Proyectos $proyecto)
    {
        $this->proyecto = $proyecto;
    }

    /**
     * Get Investigadores
     *
     * @return \DEPI\ProyectosBundle\Entity\Proyectos
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }
}
