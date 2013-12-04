<?php

namespace DEPI\PosgradosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Posgrados
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Posgrados
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=80)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo_general", type="string", length=255, nullable=true)
     */
    private $objetivoGeneral;

    /**
     * @var string
     *
     * @ORM\Column(name="clave", type="string", length=20, nullable=true)
     */
    private $clave;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Posgrados
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set objetivoGeneral
     *
     * @param string $objetivoGeneral
     * @return Posgrados
     */
    public function setObjetivoGeneral($objetivoGeneral)
    {
        $this->objetivoGeneral = $objetivoGeneral;
    
        return $this;
    }

    /**
     * Get objetivoGeneral
     *
     * @return string 
     */
    public function getObjetivoGeneral()
    {
        return $this->objetivoGeneral;
    }

    /**
     * Set clave
     *
     * @param string $clave
     * @return Posgrados
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
    
        return $this;
    }

    /**
     * Get clave
     *
     * @return string 
     */
    public function getClave()
    {
        return $this->clave;
    }
}
