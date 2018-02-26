<?php

namespace Eventos\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Invitado
 *
 *
 *
 * @author
 * @license
 * @link
 * @ORM\Table(name="ev_invitado")
 * @ORM\Entity(repositoryClass="Eventos\Repository\InvitadoRepository")
 */
class Invitado
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
     * @Annotation\Options({"label":"celular", "description":"", "addon":""})
     * @ORM\Column(type="string", length=20, unique=false, nullable=true,
     * name="celular")
     */
    public $celular = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"email", "description":"", "addon":""})
     * @ORM\Column(type="string", length=50, unique=false, nullable=true, name="email")
     */
    public $email = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"evento","empty_option": "",
     * "target_class":"\Eventos\Entity\Evento", "description":""})
     * @ORM\ManyToOne(targetEntity="\Eventos\Entity\Evento")
     * @ORM\JoinColumn(name="evento_id", referencedColumnName="id", nullable=true)
     */
    public $evento = null;

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

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEvento()
    {
        return $this->evento;
    }

    public function setEvento($evento)
    {
        $this->evento = $evento;
    }

    public function __toString()
    {
        return  $this->nombre;
    }


}

