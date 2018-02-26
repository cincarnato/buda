<?php

namespace Eventos\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Flyer
 *
 *
 *
 * @author
 * @license
 * @link
 * @ORM\Table(name="ev_flyer")
 * @ORM\Entity(repositoryClass="Eventos\Repository\FlyerRepository")
 */
class Flyer
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
     * @ORM\Column(type="string", length=200, unique=true, nullable=true,
     * name="nombre")
     */
    public $nombre = null;

    /**
     * @Annotation\Type("Zend\Form\Element\File")
     * @Annotation\Attributes({"type":"file"})
     * @Annotation\Options({"label":"imagen","absolutepath":"C:\Users\crist\Documents\NetBeansProjects\buda\public\media\flyer\","webpath":"media/flyer/",
     * "description":""})
     * @Annotation\Filter({"name":"\ZfMetal\Security\Filter\RenameUpload",
     * "options":{"target":"C:\Users\crist\Documents\NetBeansProjects\buda\public\media\flyer\","use_upload_name":1,"overwrite":1}})
     * @ORM\Column(type="string", length=200, unique=false, nullable=true,
     * name="imagen")
     */
    public $imagen = null;

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

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getImagen_ap()
    {
        return "C:\Users\crist\Documents\NetBeansProjects\buda\public\media\flyer";
    }

    public function getImagen_wp()
    {
        return "media/flyer/";
    }

    public function getImagen_fp()
    {
        return "media/flyer/".$this->imagen;
    }

    /**
     * @return null
     */
    public function __toString()
    {
        return  $this->nombre;
    }


}

