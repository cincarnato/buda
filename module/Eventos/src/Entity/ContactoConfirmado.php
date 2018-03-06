<?php

namespace Eventos\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ContactoConfirmado
 *
 *
 *
 * @author
 * @license
 * @link
 * @ORM\Table(name="ev_contacto_confirmado")
 * @ORM\Entity(repositoryClass="Eventos\Repository\ContactoConfirmadoRepository")
 */
class ContactoConfirmado
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

    public function getContacto()
    {
        return $this->contacto;
    }

    public function setContacto($contacto)
    {
        $this->contacto = $contacto;
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
        return  $this->contacto." ".  $this->evento;
    }


}

