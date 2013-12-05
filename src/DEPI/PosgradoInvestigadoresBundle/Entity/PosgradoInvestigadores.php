<?php

namespace DEPI\PosgradoInvestigadoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosgradoInvestigadores
 *
 * @ORM\Table(name="posgradoinvestigadores")
 * @ORM\Entity
 */
class PosgradoInvestigadores
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

    /** @ORM\ManyToOne(targetEntity="DEPI\InvestigadoresBundle\Entity\Investigadores") 
     *  @ORM\JoinColumn(name="investigadores", referencedColumnName="id")
     */
    private $investigadores;


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
     * @return PosgradoInvestigadores
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
     * Set investigadores
     *
     * @param \DEPI\InvestigadoresBundle\Entity\Investigadores
     * @return PosgradoInvestigadores
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
}
