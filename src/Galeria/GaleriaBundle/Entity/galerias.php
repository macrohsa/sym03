<?php

namespace Galeria\GaleriaBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;


/**
 * @ORM\Entity
 * @ORM\Table(name="Galerias")
 *  
 */
class galerias {
   /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    protected $id;
    
    
//    /**
//     * @ORM\ManyToOne(targetEntity="sitio", inversedBy="fotografos")
//     * @ORM\JoinColumn(name="sitio_id", referencedColumnName="id")
//     */
//    protected $sitio;
//    protected $fotografo;
    
        
    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message = "El nombre es obligatorio")
     * @Assert\MaxLength(limit = 50, message = "El máximo número de caracteres es 50.")
     * 
     */
    protected $nombre;
    
    
    
    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\MaxLength(limit = 100, message = "El máximo número de caracteres es 100.")
     * 
     */
    protected $galeriaURL;   
    
    
    
    /**
     * @ORM\Column(type="datetime")
     * 
     */
    protected $fechaAlta;
    
 



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
     * @return galerias
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
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return galerias
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;
    
        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set galeriaURL
     *
     * @param string $galeriaURL
     * @return galerias
     */
    public function setGaleriaURL($galeriaURL)
    {
        $this->galeriaURL = $galeriaURL;
    
        return $this;
    }

    /**
     * Get galeriaURL
     *
     * @return string 
     */
    public function getGaleriaURL()
    {
        return $this->galeriaURL;
    }
}