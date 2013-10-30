<?php

namespace DEPI\ProyectosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proyectos
 *
 * @ORM\Table(name="proyectos")
 * @ORM\Entity
 */
class Proyectos
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
     * @ORM\Column(name="clave_itm", type="string", length=20)
     */
    private $clave_itm;

    /**
     * @var string
     *
     * @ORM\Column(name="clave_conacyt", type="string", length=20)
     */
    private $clave_conacyt;

    /**
     * @var string
     *
     * @ORM\Column(name="clave_dgest", type="string", length=20)
     */
    private $clave_dgest;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_corto", type="string", length=30)
     */
    private $nombre_corto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_completo", type="string", length=80)
     */
    private $nombre_completo;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo_general", type="string", length=80)
     */
    private $objetivo_general;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivos_especificos", type="text")
     */
    private $objetivos_especificos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_apertura", type="date")
     */
    private $fecha_apertura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_termino", type="date")
     */
    private $fecha_termino;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;


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
     * Set clave_itm
     *
     * @param string $claveItm
     * @return Proyectos
     */
    public function setClaveItm($claveItm)
    {
        $this->clave_itm = $claveItm;
    
        return $this;
    }

    /**
     * Get clave_itm
     *
     * @return string 
     */
    public function getClaveItm()
    {
        return $this->clave_itm;
    }

    /**
     * Set clave_conacyt
     *
     * @param string $claveConacyt
     * @return Proyectos
     */
    public function setClaveConacyt($claveConacyt)
    {
        $this->clave_conacyt = $claveConacyt;
    
        return $this;
    }

    /**
     * Get clave_conacyt
     *
     * @return string 
     */
    public function getClaveConacyt()
    {
        return $this->clave_conacyt;
    }

    /**
     * Set clave_dgest
     *
     * @param string $claveDgest
     * @return Proyectos
     */
    public function setClaveDgest($claveDgest)
    {
        $this->clave_dgest = $claveDgest;
    
        return $this;
    }

    /**
     * Get clave_dgest
     *
     * @return string 
     */
    public function getClaveDgest()
    {
        return $this->clave_dgest;
    }

    /**
     * Set nombre_corto
     *
     * @param string $nombreCorto
     * @return Proyectos
     */
    public function setNombreCorto($nombreCorto)
    {
        $this->nombre_corto = $nombreCorto;
    
        return $this;
    }

    /**
     * Get nombre_corto
     *
     * @return string 
     */
    public function getNombreCorto()
    {
        return $this->nombre_corto;
    }

    /**
     * Set nombre_completo
     *
     * @param string $nombreCompleto
     * @return Proyectos
     */
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombre_completo = $nombreCompleto;
    
        return $this;
    }

    /**
     * Get nombre_completo
     *
     * @return string 
     */
    public function getNombreCompleto()
    {
        return $this->nombre_completo;
    }

    /**
     * Set objetivo_general
     *
     * @param string $objetivo_general
     * @return Proyectos
     */
    public function setObjetivoGeneral($objetivo_general)
    {
        $this->objetivo_general = $objetivo_general;
    
        return $this;
    }

    /**
     * Get objetivo_general
     *
     * @return string 
     */
    public function getObjetivoGeneral()
    {
        return $this->meta;
    }

    /**
     * Set objetivos_especificos
     *
     * @param string $objetivos_especificos
     * @return Proyectos
     */
    public function setObjetivosEspecificos($objetivos_especificos)
    {
        $this->objetivos_especificos = $objetivos_especificos;
    
        return $this;
    }

    /**
     * Get objetivos_especificos
     *
     * @return string 
     */
    public function getObjetivosEspecificos()
    {
        return $this->objetivos_especificos;
    }

    /**
     * Set fecha_apertura
     *
     * @param \DateTime $fechaApertura
     * @return Proyectos
     */
    public function setFechaApertura($fechaApertura)
    {
        $this->fecha_apertura = $fechaApertura;
    
        return $this;
    }

    /**
     * Get fecha_apertura
     *
     * @return \DateTime 
     */
    public function getFechaApertura()
    {
        return $this->fecha_apertura;
    }

    /**
     * Set fecha_termino
     *
     * @param \DateTime $fechaTermino
     * @return Proyectos
     */
    public function setFechaTermino($fechaTermino)
    {
        $this->fecha_termino = $fechaTermino;
    
        return $this;
    }

    /**
     * Get fecha_termino
     *
     * @return \DateTime 
     */
    public function getFechaTermino()
    {
        return $this->fecha_termino;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Proyectos
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function __toString()
    {
        return $this->getNombreCorto();
    }    
}
