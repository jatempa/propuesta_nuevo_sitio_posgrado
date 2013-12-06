<?php

namespace DEPI\PosgradoLineasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosgradoLineas
 *
 * @ORM\Table(name="posgradolineas")
 * @ORM\Entity(repositoryClass="DEPI\PosgradoLineasBundle\Entity\PosgradoLineasRepository")
 */
class PosgradoLineas
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

    /** @ORM\ManyToOne(targetEntity="DEPI\LineasInvestigacionBundle\Entity\LineasInvestigacion") 
     *  @ORM\JoinColumn(name="lineasinvestigacion", referencedColumnName="id")
     */
    private $lineasinvestigacion;


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
     * @return PosgradoLineas
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
     * Set lineasinvestigacion
     *
     * @param \DEPI\LineasInvestigacionBundle\Entity\LineasInvestigacion $lineasinvestigacion
     * @return PosgradoLineas
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
}
