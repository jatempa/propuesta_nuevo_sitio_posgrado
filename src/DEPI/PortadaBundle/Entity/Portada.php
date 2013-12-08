<?php

namespace DEPI\PortadaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Portada
 *
 * @ORM\Table(name="portada")
 * @ORM\Entity(repositoryClass="DEPI\PortadaBundle\Entity\PortadaRepository")
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
     * @ORM\Column(name="titulo", type="string", length=30, nullable=true)
     */
    private $titulo;

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
     *
     * @Assert\Image(maxSize = "500k", minWidth = 1000, maxWidth = 1000, minHeight = 300, maxHeight = 300)
     */
    protected $foto;


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
     * Set titulo
     *
     * @param string $titulo
     * @return Noticias
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set imagenBanner
     *
     * @param string $foto
     */
    public function setImagenBanner($imagenBanner)
    {
        $this->imagenBanner = $imagenBanner;
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

    /**
     * Set foto.
     *
     * @param UploadedFile $foto
     */
    public function setFoto(UploadedFile $foto = null)
    {
        $this->foto = $foto;
    }

    /**
     * Get foto.
     *
     * @return UploadedFile
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Sube la foto de la oferta copiándola en el directorio que se indica y
     * guardando en la entidad la ruta hasta la foto
     *
     * @param string $directorioDestino Ruta completa del directorio al que se sube la foto
     */
    public function subirFoto($directorioDestino)
    {
        if (null === $this->getFoto()) {
            return;
        }

        $nombreArchivoFoto = $this->getFoto()->getClientOriginalName();

        $this->getFoto()->move($directorioDestino, $nombreArchivoFoto);

        $this->setImagenBanner($nombreArchivoFoto);
    }
}
