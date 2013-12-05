<?php

namespace DEPI\PosgradoAreasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosgradoAreas
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PosgradoAreas
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
     * @ORM\Column(name="area", type="integer")
     */
    private $area;


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
     * @return PosgradoAreas
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
     * Set area
     *
     * @param integer $area
     * @return PosgradoAreas
     */
    public function setArea($area)
    {
        $this->area = $area;
    
        return $this;
    }

    /**
     * Get area
     *
     * @return integer 
     */
    public function getArea()
    {
        return $this->area;
    }
}
