<?php

namespace DEPI\InvestigadoresProyectosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvestigadoresProyectos
 *
 * @ORM\Table(name="investigadoresProyectos")
 * @ORM\Entity(repositoryClass="DEPI\InvestigadoresProyectosBundle\Entity\InvestigadoresProyectosRepository")
 */
class InvestigadoresProyectos
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
     * @return InvestigadoresProyectos
     */
    public function setInvestigador(\DEPI\InvestigadoresBundle\Entity\Investigadores $investigador)
    {
        $this->investigador = $investigador;
    }

    /**
     * Get Investigadores
     *
     * @return \DEPI\InvestigadoresBundle\Entity\Investigadores
     */
    public function getInvestigador()
    {
        return $this->investigador;
    }

    /**
     * Set Proyectos
     *
     * @param \DEPI\ProyectosBundle\Entity\Proyectos
     * @return InvestigadoresProyectos
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
