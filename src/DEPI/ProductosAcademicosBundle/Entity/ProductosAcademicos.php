<?php

namespace DEPI\ProductosAcademicosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductosAcademicos
 *
 * @ORM\Table(name="productosacademicos")
 * @ORM\Entity
 */
class ProductosAcademicos
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
     * @ORM\Column(name="meta", type="string", length=150)
     */
    private $meta;


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
     * Set meta
     *
     * @param string $meta
     * @return ProductosAcademicos
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
    
        return $this;
    }

    /**
     * Get meta
     *
     * @return string 
     */
    public function getMeta()
    {
        return $this->meta;
    }

    public function __toString()
    {
        return $this->getMeta();
    }   
}
