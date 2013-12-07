<?php

namespace DEPI\PortadaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Portada
 *
 * @ORM\Table(name="portada")
 * @ORM\Entity
 */
class Portada
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
     * @ORM\Column(name="imagen_banner", type="string", length=255)
     */
    private $imagenBanner;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_publicacion", type="datetime")
     */
    private $fechaPublicacion;


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
     * Set imagenBanner
     *
     * @param string $imagenBanner
     * @return Portada
     */
    public function setImagenBanner($imagenBanner)
    {
        $this->imagenBanner = $imagenBanner;
    
        return $this;
    }

    /**
     * Get imagenBanner
     *
     * @return string 
     */
    public function getImagenBanner()
    {
        return $this->imagenBanner;
    }

    /**
     * Set fechaPublicacion
     *
     * @param \DateTime $fechaPublicacion
     * @return Noticias
     */
    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;
    
        return $this;
    }

    /**
     * Get fechaPublicacion
     *
     * @return \DateTime 
     */
    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }
}
