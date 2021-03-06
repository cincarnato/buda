<?php

namespace Eventos\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Contacto
 *
 *
 *
 * @author
 * @license
 * @link
 * @ORM\Table(name="ev_contacto")
 * @ORM\Entity(repositoryClass="Eventos\Repository\ContactoRepository")
 */
class Contacto
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
     * @ORM\Column(type="string", length=100, unique=false, nullable=true,
     * name="nombre")
     */
    public $nombre = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"apellido", "description":"", "addon":""})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true,
     * name="apellido")
     */
    public $apellido = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"nombreCompleto", "description":"", "addon":""})
     * @ORM\Column(type="string", length=200, unique=false, nullable=true,
     * name="nombre_completo")
     */
    public $nombreCompleto = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"email", "description":"", "addon":""})
     * @ORM\Column(type="string", length=200, unique=false, nullable=true,
     * name="email")
     */
    public $email = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"celular", "description":"", "addon":""})
     * @ORM\Column(type="string", length=20, unique=false, nullable=true,
     * name="celular")
     */
    public $celular = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Attributes({"type":"date"})
     * @Annotation\Options({"label":"nacimiento", "description":"", "addon":""})
     * @ORM\Column(type="date", unique=false, nullable=true, name="nacimiento")
     */
    public $nacimiento = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"cumple", "description":"", "addon":""})
     * @ORM\Column(type="string", length=4, unique=false, nullable=true, name="cumple")
     */
    public $cumple = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"cumpleTexto", "description":"", "addon":""})
     * @ORM\Column(type="string", length=40, unique=false, nullable=true,
     * name="cumple_texto")
     */
    public $cumpleTexto = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"edad", "description":"", "addon":""})
     * @ORM\Column(type="string", length=3, unique=false, nullable=true, name="edad")
     */
    public $edad = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"facebookId", "description":"", "addon":""})
     * @ORM\Column(type="string", length=50, unique=false, nullable=true,
     * name="facebook_id")
     */
    public $facebookId = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"facebookUrl", "description":"", "addon":""})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true,
     * name="facebook_url")
     */
    public $facebookUrl = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"googleId", "description":"", "addon":""})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true,
     * name="google_id")
     */
    public $googleId = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"googleUrl", "description":"", "addon":""})
     * @ORM\Column(type="string", length=120, unique=false, nullable=true,
     * name="google_url")
     */
    public $googleUrl = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"source", "description":"", "addon":""})
     * @ORM\Column(type="string", length=20, unique=false, nullable=true,
     * name="source")
     */
    public $source = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"googlePicture", "description":"", "addon":""})
     * @ORM\Column(type="string", length=200, unique=false, nullable=true,
     * name="google_picture")
     */
    public $googlePicture = null;


    /**
     * @Annotation\Exclude()
     * @ORM\OneToMany(targetEntity="\Eventos\Entity\ContactoConfirmado",
     * mappedBy="contacto", cascade="remove")
     */
    public $confirmados = null;

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

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }

    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    public function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;
    }

    public function getCumple()
    {
        return $this->cumple;
    }

    public function setCumple($cumple)
    {
        $this->cumple = $cumple;
    }

    public function getCumpleTexto()
    {
        return $this->cumpleTexto;
    }

    public function setCumpleTexto($cumpleTexto)
    {
        $this->cumpleTexto = $cumpleTexto;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function getFacebookId()
    {
        return $this->facebookId;
    }

    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;
    }

    public function getFacebookUrl()
    {
        return $this->facebookUrl;
    }

    public function setFacebookUrl($facebookUrl)
    {
        $this->facebookUrl = $facebookUrl;
    }

    public function getImgProfileLarge()
    {
        if ($this->getSource() == "facebook") {
            return "http://graph.facebook.com/" . $this->getFacebookId() . "/picture?type=large";
        }

        if ($this->getSource() == "google") {
            return $this->getGooglePicture();
        }

        return "http://graph.facebook.com/" . $this->getFacebookId() . "/picture?type=large";
    }

    public function getImgProfile()
    {
        if ($this->getSource() == "facebook") {
            return "http://graph.facebook.com/" . $this->getFacebookId() . "/picture?type=small";
        }

        if ($this->getSource() == "google") {
            return $this->getGooglePicture();
        }

        return "http://graph.facebook.com/" . $this->getFacebookId() . "/picture?type=small";
    }

    public function getGoogleId()
    {
        return $this->googleId;
    }

    public function setGoogleId($googleId)
    {
        $this->googleId = $googleId;
    }

    public function getGoogleUrl()
    {
        return $this->googleUrl;
    }

    public function setGoogleUrl($googleUrl)
    {
        $this->googleUrl = $googleUrl;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function setSource($source)
    {
        $this->source = $source;
    }

    public function getGooglePicture()
    {
        return $this->googlePicture;
    }

    public function setGooglePicture($googlePicture)
    {
        $this->googlePicture = $googlePicture;
    }

    public function __toString()
    {
        return $this->nombreCompleto;
    }

    /**
     * @return mixed
     */
    public function getConfirmados()
    {
        return $this->confirmados;
    }

    /**
     * @param mixed $confirmados
     */
    public function setConfirmados($confirmados)
    {
        $this->confirmados = $confirmados;
    }



}

