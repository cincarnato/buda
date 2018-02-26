<?php

namespace Eventos\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Fotos
 *
 *
 *
 * @author
 * @license
 * @link
 * @ORM\Table(name="ev_fotos")
 * @ORM\Entity(repositoryClass="Eventos\Repository\FotosRepository")
 */
class Fotos
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
     * @ORM\Column(type="string", length=200, unique=false, nullable=true,
     * name="nombre")
     */
    public $nombre = null;

    /**
     * @Annotation\Type("Zend\Form\Element\File")
     * @Annotation\Attributes({"type":"file"})
     * @Annotation\Options({"label":"imagen","absolutepath":"/var/www/buda/public/media/fotos/","webpath":"/media/fotos/",
     * "description":""})
     * @Annotation\Filter({"name":"\ZfMetal\Commons\Filter\RenameUpload",
     * "options":{"target":"/var/www/buda/public/media/fotos/","use_upload_name":1,"overwrite":1}})
     * @ORM\Column(type="string", length=200, unique=false, nullable=true,
     * name="imagen")
     */
    public $imagen = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"lugar","empty_option": "",
     * "target_class":"\Eventos\Entity\Lugar", "description":""})
     * @ORM\ManyToOne(targetEntity="\Eventos\Entity\Lugar")
     * @ORM\JoinColumn(name="lugar_id", referencedColumnName="id", nullable=true)
     */
    public $lugar = null;

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
        return "/var/www/buda/public/media/fotos/";
    }

    public function getImagen_wp()
    {
        return "/media/fotos/";
    }

    public function getImagen_fp()
    {
        return "/media/fotos/".$this->imagen;
    }

    public function getLugar()
    {
        return $this->lugar;
    }

    public function setLugar($lugar)
    {
        $this->lugar = $lugar;
    }

    public function __toString()
    {
        return  $this->nombre;
    }


}

