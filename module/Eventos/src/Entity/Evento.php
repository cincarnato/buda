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
    const NOBODY = 0;
    const OWNER = 1;
    const GUEST = 2;

    const FACEBOOK = "Facebook";
    const GOOGLE = "Google";
    const MANUAL = "Manual";



    /**
     * Describe el estado actual de la sesion sobre este evento
     * NOBODY : Nadie logueado
     * OWNER : Propietario Logueado
     * GUEST : Invitado Logueado
     * @Annotation\Exclude()
     * @var integer
     */
    public $estado = self::NOBODY;

    /**
     * @var string
     * @Annotation\Exclude()
     * */
    public $via = null;

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
     * @Annotation\Options({"label":"nombre", "description":"No se admiten espacios
     * dado que el nombre del evento será parte del link.", "addon":""})
     * @ORM\Column(type="string", length=100, unique=true, nullable=false,
     * name="nombre")
     */
    public $nombre = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"lugar","empty_option": "",
     * "target_class":"\Eventos\Entity\Lugar", "description":""})
     * @ORM\ManyToOne(targetEntity="\Eventos\Entity\Lugar")
     * @ORM\JoinColumn(name="lugar_id", referencedColumnName="id", nullable=false)
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
     * @ORM\Column(type="date", unique=false, nullable=false, name="fecha")
     */
    public $fecha = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"hora", "description":"", "addon":""})
     * @ORM\Column(type="string", length=2, unique=false, nullable=false, name="hora")
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

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"contacto","empty_option": "",
     * "target_class":"\Eventos\Entity\Contacto", "description":"Si el contacto aun no
     * existe, dejarlo vacío y enviar el link de confirmación"})
     * @ORM\ManyToOne(targetEntity="\Eventos\Entity\Contacto")
     * @ORM\JoinColumn(name="contacto_id", referencedColumnName="id", nullable=true)
     */
    public $contacto = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"clave", "description":"Campo Opcional. Sirve para
     * validar el contacto propietario del evento.", "addon":""})
     * @ORM\Column(type="string", length=4, unique=false, nullable=true, name="clave")
     */
    public $clave = null;

    /**
     * @Annotation\Exclude()
     * @ORM\OneToMany(targetEntity="\Eventos\Entity\ContactoConfirmado",
     * mappedBy="evento")
     */
    public $confirmados = null;

    /**
     * @Annotation\Exclude()
     * @ORM\OneToMany(targetEntity="\Eventos\Entity\Invitado", mappedBy="evento")
     */
    public $invitados = null;

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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function getConfirmados()
    {
        return $this->confirmados;
    }

    public function setConfirmados($confirmados)
    {
        $this->confirmados = $confirmados;
    }

    public function getInvitados()
    {
        return $this->invitados;
    }

    public function setInvitados($invitados)
    {
        $this->invitados = $invitados;
    }

    public function __toString()
    {
        return  $this->nombre;
    }

    /**
     * @return integer
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param integer $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function isOwner(){
        if($this->estado == self::OWNER){
            return 'true';
        }
        return 'false';
    }

    public function getInvitadosJson(){
        $a = array();
        if($this->getInvitados()){
            foreach($this->getInvitados() as $invitado){
                $a[] = $invitado->toArray();
            }
        }
        return json_encode($a);
    }

    /**
     * @return string
     */
    public function getVia()
    {
        return $this->via;
    }

    /**
     * @param string $via
     */
    public function setVia($via)
    {
        $this->via = $via;
    }



}

