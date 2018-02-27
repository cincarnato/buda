<?php

namespace Eventos\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Evento
 *
 *
 *
 * @author
 * @license
 * @link
 * @ORM\Table(name="ev_evento")
 * @ORM\Entity(repositoryClass="Eventos\Repository\EventoRepository")
 */
class Evento
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
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"contacto","empty_option": "",
     * "target_class":"\Eventos\Entity\Contacto", "description":""})
     * @ORM\ManyToOne(targetEntity="\Eventos\Entity\Contacto")
     * @ORM\JoinColumn(name="contacto_id", referencedColumnName="id", nullable=true)
     */
    public $contacto = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"lugar","empty_option": "",
     * "target_class":"\Eventos\Entity\Lugar", "description":""})
     * @ORM\ManyToOne(targetEntity="\Eventos\Entity\Lugar")
     * @ORM\JoinColumn(name="lugar_id", referencedColumnName="id", nullable=true)
     */
    public $lugar = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"flyer","empty_option": "",
     * "target_class":"\Eventos\Entity\Flyer", "description":""})
     * @ORM\ManyToOne(targetEntity="\Eventos\Entity\Flyer")
     * @ORM\JoinColumn(name="flyer_id", referencedColumnName="id", nullable=true)
     */
    public $flyer = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Attributes({"type":"date"})
     * @Annotation\Options({"label":"fecha", "description":"", "addon":""})
     * @ORM\Column(type="date", unique=false, nullable=true, name="fecha")
     */
    public $fecha = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"hora", "description":"", "addon":""})
     * @ORM\Column(type="string", length=2, unique=false, nullable=true, name="hora")
     */
    public $hora = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"minutos", "description":"", "addon":""})
     * @ORM\Column(type="string", length=2, unique=false, nullable=true,
     * name="minutos")
     */
    public $minutos = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"detalleEvento","empty_option": "",
     * "target_class":"\Eventos\Entity\DetalleEvento", "description":""})
     * @ORM\ManyToOne(targetEntity="\Eventos\Entity\DetalleEvento")
     * @ORM\JoinColumn(name="detalle_evento_id", referencedColumnName="id",
     * nullable=true)
     */
    public $detalleEvento = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getContacto()
    {
        return $this->contacto;
    }

    public function setContacto($contacto)
    {
        $this->contacto = $contacto;
    }

    public function getLugar()
    {
        return $this->lugar;
    }

    public function setLugar($lugar)
    {
        $this->lugar = $lugar;
    }

    public function getFlyer()
    {
        return $this->flyer;
    }

    public function setFlyer($flyer)
    {
        $this->flyer = $flyer;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function getMinutos()
    {
        return $this->minutos;
    }

    public function setMinutos($minutos)
    {
        $this->minutos = $minutos;
    }

    public function getDetalleEvento()
    {
        return $this->detalleEvento;
    }

    public function setDetalleEvento($detalleEvento)
    {
        $this->detalleEvento = $detalleEvento;
    }

    public function __toString()
    {
        if($this->contacto) {
            return $this->contacto->getNombreCompleto();
        }
        return "";
    }


}

