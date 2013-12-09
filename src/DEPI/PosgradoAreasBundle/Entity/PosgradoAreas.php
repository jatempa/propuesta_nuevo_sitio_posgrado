<?php

namespace DEPI\PosgradoAreasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosgradoAreas
 *
 * @ORM\Table(name="posgradoareas")
 * @ORM\Entity(repositoryClass="DEPI\PosgradoAreasBundle\Entity\PosgradoAreasRepository")
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

    /** @ORM\ManyToOne(targetEntity="DEPI\PosgradosBundle\Entity\Posgrados") 
     *  @ORM\JoinColumn(name="posgrado", referencedColumnName="id")
     */
    private $posgrado;

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
     * Set posgrado
     *
     * @param \DEPI\PosgradosBundle\Entity\Posgrados $posgrado
     * @return PosgradoAreas
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
     * Set area
     *
     * @param \DEPI\AreasBundle\Entity\Areas $area
     * @return PosgradoAreas
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
