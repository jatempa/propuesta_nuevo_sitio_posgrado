<?php

namespace DEPI\PosgradoInvestigadoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosgradoInvestigadores
 *
 * @ORM\Table()
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

    /**
     * @var integer
     *
     * @ORM\Column(name="posgrado", type="integer")
     */
    private $posgrado;

    /**
     * @var integer
     *
     * @ORM\Column(name="investigador", type="integer")
     */
    private $investigador;


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
     * @return PosgradoInvestigadores
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
     * Set investigador
     *
     * @param integer $investigador
     * @return PosgradoInvestigadores
     */
    public function setInvestigador($investigador)
    {
        $this->investigador = $investigador;
    
        return $this;
    }

    /**
     * Get investigador
     *
     * @return integer 
     */
    public function getInvestigador()
    {
        return $this->investigador;
    }
}
