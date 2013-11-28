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
    private $claveItm;

    /**
     * @var string
     *
     * @ORM\Column(name="clave_conacyt", type="string", length=20)
     */
    private $claveConacyt;

    /**
     * @var string
     *
     * @ORM\Column(name="clave_dgest", type="string", length=20)
     */
    private $claveDgest;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_corto", type="string", length=30)
     */
    private $nombreCorto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_completo", type="string", length=80)
     */
    private $nombreCompleto;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo_general", type="string", length=80)
     */
    private $objetivoGeneral;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivos_especificos", type="text")
     */
    private $objetivosEspecificos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_apertura", type="date")
     */
    private $fechaApertura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_termino", type="date")
     */
    private $fechaTermino;

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
        $this->claveItm = $claveItm;
    
        return $this;
    }

    /**
     * Get clave_itm
     *
     * @return string 
     */
    public function getClaveItm()
    {
        return $this->claveItm;
    }

    /**
     * Set clave_conacyt
     *
     * @param string $claveConacyt
     * @return Proyectos
     */
    public function setClaveConacyt($claveConacyt)
    {
        $this->claveConacyt = $claveConacyt;
    
        return $this;
    }

    /**
     * Get clave_conacyt
     *
     * @return string 
     */
    public function getClaveConacyt()
    {
        return $this->claveConacyt;
    }

    /**
     * Set clave_dgest
     *
     * @param string $claveDgest
     * @return Proyectos
     */
    public function setClaveDgest($claveDgest)
    {
        $this->claveDgest = $claveDgest;
    
        return $this;
    }

    /**
     * Get clave_dgest
     *
     * @return string 
     */
    public function getClaveDgest()
    {
        return $this->claveDgest;
    }

    /**
     * Set nombre_corto
     *
     * @param string $nombreCorto
     * @return Proyectos
     */
    public function setNombreCorto($nombreCorto)
    {
        $this->nombreCorto = $nombreCorto;
    
        return $this;
    }

    /**
     * Get nombre_corto
     *
     * @return string 
     */
    public function getNombreCorto()
    {
        return $this->nombreCorto;
    }

    /**
     * Set nombre_completo
     *
     * @param string $nombreCompleto
     * @return Proyectos
     */
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;
    
        return $this;
    }

    /**
     * Get nombre_completo
     *
     * @return string 
     */
    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }

    /**
     * Set objetivo_general
     *
     * @param string $objetivo_general
     * @return Proyectos
     */
    public function setObjetivoGeneral($objetivoGeneral)
    {
        $this->objetivoGeneral = $objetivoGeneral;
    
        return $this;
    }

    /**
     * Get objetivo_general
     *
     * @return string 
     */
    public function getObjetivoGeneral()
    {
        return $this->objetivoGeneral;
    }

    /**
     * Set objetivos_especificos
     *
     * @param string $objetivos_especificos
     * @return Proyectos
     */
    public function setObjetivosEspecificos($objetivosEspecificos)
    {
        $this->objetivosEspecificos = $objetivosEspecificos;
    
        return $this;
    }

    /**
     * Get objetivos_especificos
     *
     * @return string 
     */
    public function getObjetivosEspecificos()
    {
        return $this->objetivosEspecificos;
    }

    /**
     * Set fecha_apertura
     *
     * @param \DateTime $fechaApertura
     * @return Proyectos
     */
    public function setFechaApertura($fechaApertura)
    {
        $this->fechaApertura = $fechaApertura;
    
        return $this;
    }

    /**
     * Get fecha_apertura
     *
     * @return \DateTime 
     */
    public function getFechaApertura()
    {
        return $this->fechaApertura;
    }

    /**
     * Set fecha_termino
     *
     * @param \DateTime $fechaTermino
     * @return Proyectos
     */
    public function setFechaTermino($fechaTermino)
    {
        $this->fechaTermino = $fechaTermino;
    
        return $this;
    }

    /**
     * Get fecha_termino
     *
     * @return \DateTime 
     */
    public function getFechaTermino()
    {
        return $this->fechaTermino;
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
