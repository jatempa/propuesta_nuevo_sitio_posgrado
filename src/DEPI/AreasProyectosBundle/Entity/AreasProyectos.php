<?php

namespace DEPI\AreasProyectosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AreasProyectos
 *
 * @ORM\Table(name="areasproyectos")
 * @ORM\Entity
 */
class AreasProyectos
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

    
    /** @ORM\ManyToOne(targetEntity="DEPI\AreasBundle\Entity\Areas") 
     *  @ORM\JoinColumn(name="area", referencedColumnName="id")
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
     * Set proyecto
     *
     * @param \DEPI\ProyectosBundle\Entity\Proyectos $proyecto
     * @return AreasProyectos
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
     * Set area
     *
     * @param \DEPI\AreasBundle\Entity\Areas $area
     * @return AreasProyectos
     */
    public function setArea(\DEPI\AreasBundle\Entity\Areas $area)
    {
        $this->area = $area;
    }

    /**
     * Get area
     *
     * @return \DEPI\AreasBundle\Entity\Areas
     */
    public function getArea()
    {
        return $this->area;
    }
}
