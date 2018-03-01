<?php

namespace Eventos\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Lugar
 * 
 * 
 * 
 * @author
 * @license
 * @link
 * @ORM\Table(name="ev_lugar")
 * @ORM\Entity(repositoryClass="Eventos\Repository\LugarRepository")
 */
class Lugar
{

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"ID", "description":"", "addon":""})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", length=11, unique=false, nullable=false, name="id")
     */
    public $id = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"nombre", "description":"", "addon":""})
     * @ORM\Column(type="string", length=200, unique=true, nullable=false,
     * name="nombre")
     */
    public $nombre = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"direccion", "description":"", "addon":""})
     * @ORM\Column(type="string", length=200, unique=false, nullable=true,
     * name="direccion")
     */
    public $direccion = null;

    /**
     * @Annotation\Exclude()
     * @ORM\OneToMany(targetEntity="\Eventos\Entity\Fotos", mappedBy="lugar")
     */
    public $fotos = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getFotos()
    {
        return $this->fotos;
    }

    public function setFotos($fotos)
    {
        $this->fotos = $fotos;
    }

    public function __toString()
    {
        return  $this->nombre;
    }


}

