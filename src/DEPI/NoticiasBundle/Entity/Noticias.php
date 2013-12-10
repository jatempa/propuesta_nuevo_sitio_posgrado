<?php

namespace DEPI\NoticiasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Noticias
 *
 * @ORM\Table(name="noticias")
 * @ORM\Entity(repositoryClass="DEPI\NoticiasBundle\Entity\NoticiasRepository")
 */
class Noticias
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
     * @ORM\Column(name="titulo", type="string", length=30)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text")
     */
    private $contenido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_publicacion", type="datetime")
     */
    private $fechaPublicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="rutaDocumento", type="string", length=255, nullable=true)
     */
    private $rutaDocumento;

    /**
     * @Assert\File(
     *     maxSize = "2048k"
     * )
     */
    protected $documento;


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
     * Set contenido
     *
     * @param string $contenido
     * @return Noticias
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    
        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
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
     * Set rutaDocumento
     *
     * @param string $documento
     */
    public function setRutaDocumento($rutaDocumento)
    {
        $this->rutaDocumento = $rutaDocumento;
    }

    /**
     * Get rutaDocumento
     *
     * @return string
     */
    public function getRutaDocumento()
    {
        return $this->rutaDocumento;
    }

    /**
     * Set documento.
     *
     * @param UploadedFile $documento
     */
    public function setDocumento(UploadedFile $documento = null)
    {
        $this->documento = $documento;
    }

    /**
     * Get documento.
     *
     * @return UploadedFile
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Sube la documento de la oferta copiándola en el directorio que se indica y
     * guardando en la entidad la ruta hasta la documento
     *
     * @param string $directorioDestino Ruta completa del directorio al que se sube la documento
     */
    public function subirDocumento($directorioDestino)
    {
        if (null === $this->getDocumento()) {
            return;
        }

        $nombreArchivoDocumento = $this->getDocumento()->getClientOriginalName();

        $this->getDocumento()->move($directorioDestino, $nombreArchivoDocumento);

        $this->setRutaDocumento($nombreArchivoDocumento);
    }
}
