<?php

namespace DEPI\InvestigadoresLineasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvestigadoresLineas
 *
 * @ORM\Table(name="investigadoreslineas")
 * @ORM\Entity
 */
class InvestigadoresLineas
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

    /** @ORM\ManyToOne(targetEntity="DEPI\LineasInvestigacionBundle\Entity\LineasInvestigacion") 
     *  @ORM\JoinColumn(name="lineasinvestigacion", referencedColumnName="id")
     */
    private $lineasinvestigacion;

    /**
     * @var string
     *
     * @ORM\Column(name="rol", type="string", length=20)
     */
    private $rol;


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
     * @return InvestigadoresLineas
     */
    public function setInvestigadores(\DEPI\InvestigadoresBundle\Entity\Investigadores $investigadores)
    {
        $this->investigadores = $investigadores;
    }

    /**
     * Get investigadores
     *
     * @return \DEPI\InvestigadoresBundle\Entity\Investigadores
     */
    public function getInvestigadores()
    {
        return $this->investigadores;
    }

    /**
     * Set lineasinvestigacion
     *
     * @param \DEPI\LineasInvestigacionBundle\Entity\LineasInvestigacion
     * @return InvestigadoresLineas
     */
    public function setLineasinvestigacion(\DEPI\LineasInvestigacionBundle\Entity\LineasInvestigacion $lineasinvestigacion)
    {
        $this->lineasinvestigacion = $lineasinvestigacion;
    }

    /**
     * Get lineasinvestigacion
     *
     * @return \DEPI\LineasInvestigacionBundle\Entity\LineasInvestigacion
     */
    public function getLineasinvestigacion()
    {
        return $this->lineasinvestigacion;
    }

    /**
     * Set rol
     *
     * @param string $rol
     * @return InvestigadoresLineas
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    
        return $this;
    }

    /**
     * Get rol
     *
     * @return string 
     */
    public function getRol()
    {
        return $this->rol;
    }
}
