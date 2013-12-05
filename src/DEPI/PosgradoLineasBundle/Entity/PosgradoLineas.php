<?php

namespace DEPI\PosgradoLineasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosgradoLineas
 *
 * @ORM\Table()
 * @ORM\Entity
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

    /**
     * @var integer
     *
     * @ORM\Column(name="posgrado", type="integer")
     */
    private $posgrado;

    /**
     * @var integer
     *
     * @ORM\Column(name="lineasinvestigacion", type="integer")
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
     * @param integer $posgrado
     * @return PosgradoLineas
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
     * Set lineasinvestigacion
     *
     * @param integer $lineasinvestigacion
     * @return PosgradoLineas
     */
    public function setLineasinvestigacion($lineasinvestigacion)
    {
        $this->lineasinvestigacion = $lineasinvestigacion;
    
        return $this;
    }

    /**
     * Get lineasinvestigacion
     *
     * @return integer 
     */
    public function getLineasinvestigacion()
    {
        return $this->lineasinvestigacion;
    }
}
