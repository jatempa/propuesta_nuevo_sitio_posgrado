<?php

namespace DEPI\ProyectosProductosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProyectosProductos
 *
 * @ORM\Table(name="proyectosproductos")
 * @ORM\Entity
 */
class ProyectosProductos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** @ORM\ManyToOne(targetEntity="DEPI\ProyectosBundle\Entity\Proyectos") 
     *  @ORM\JoinColumn(name="proyecto", referencedColumnName="id")
     */
    private $proyecto;

    /** @ORM\ManyToOne(targetEntity="DEPI\ProductosAcademicosBundle\Entity\ProductosAcademicos") 
     *  @ORM\JoinColumn(name="productoAcademico", referencedColumnName="id")
     */
    private $productoAcademico;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_cumplimiento", type="date")
     */
    private $fechaCumplimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text")
     */
    private $observaciones;


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
     * Set proyecto
     *
     * @param \DEPI\ProyectosBundle\Entity\Proyectos
     * @return ProyectosProductos
     */
    public function setProyecto(\DEPI\ProyectosBundle\Entity\Proyectos $proyecto)
    {
        $this->proyecto = $proyecto;
    }

    /**
     * Get proyecto
     *
     * @return \DEPI\ProyectosBundle\Entity\Proyectos
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }

    /**
     * Set productoAcademico
     *
     * @param \DEPI\ProductosAcademicosBundle\Entity\ProductosAcademicos
     * @return ProyectosProductos
     */
    public function setProductoAcademico(\DEPI\ProductosAcademicosBundle\Entity\ProductosAcademicos $productoAcademico)
    {
        $this->productoAcademico = $productoAcademico;
    }

    /**
     * Get productoAcademico
     *
     * @return \DEPI\ProductosAcademicosBundle\Entity\ProductosAcademicos
     */
    public function getProductoAcademico()
    {
        return $this->productoAcademico;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return ProyectosProductos
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set fechaCumplimiento
     *
     * @param \DateTime $fechaCumplimiento
     * @return ProyectosProductos
     */
    public function setFechaCumplimiento($fechaCumplimiento)
    {
        $this->fechaCumplimiento = $fechaCumplimiento;
    
        return $this;
    }

    /**
     * Get fechaCumplimiento
     *
     * @return \DateTime 
     */
    public function getFechaCumplimiento()
    {
        return $this->fechaCumplimiento;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return ProyectosProductos
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }
}
