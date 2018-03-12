<?php

namespace Landing\Controller;

use Eventos\Entity\Contacto;
use Eventos\Entity\Evento;
use Zend\Mvc\Controller\AbstractActionController;
use Eventos\Service\FacebookUser;
use Eventos\Service\GoogleUser;

/**
 * BaseController
 *
 *
 *
 * @author
 * @license
 * @link
 */
class BaseController extends AbstractActionController
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    /**
     * @var Evento
     */
    protected $evento = null;


    /**
     * @var Contacto
     */
    protected $contacto = null;


    /**
     * @var FacebookUser
     */
    protected $fu = null;

    /**
     * @var GoogleUser
     */
    protected $gu = null;




    public function getEm()
    {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEntityRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em, \Eventos\Service\FacebookUser $fu, \Eventos\Service\GoogleUser $gu)
    {
        $this->em = $em;
        $this->fu = $fu;
        $this->gu = $gu;
    }



    protected function getEvento()
    {
        if (!$this->evento) {
            $id = $this->params("id");

            /** @var $evento \Eventos\Entity\Evento */
            if ($id) {
                $this->evento = $this->getEventoRepository()->find($id);
            } else {
                $name = $this->params("name");
                /** @var $evento \Eventos\Entity\Evento */
                if ($name) {
                    $this->evento = $this->getEventoRepository()->findOneByNombre($name);
                }
            }
        }
        return $this->evento;
    }

    /**
     * @return Contacto|null
     */
    protected function obtenerContacto()
    {
        if (!$this->contacto) {
            if ($this->getFu()->getFacebookUserData()) {
                $contacto = $this->getContactoRepository()->findOneByEmail($this->getFu()->getFacebookUserData()->getEmail());

                if (!$contacto) {
                    $contacto = new Contacto();
                }

                $contacto->setNombreCompleto($this->getFu()->getFacebookUserData()->getName());
                $contacto->setEmail($this->getFu()->getFacebookUserData()->getEmail());
                $contacto->setFacebookId($this->getFu()->getFacebookUserData()->getId());
                $contacto->setFacebookUrl($this->getFu()->getFacebookUserData()->getLink());
                $contacto->setNombre($this->getFu()->getFacebookUserData()->getFirstName());
                $contacto->setApellido($this->getFu()->getFacebookUserData()->getLastName());

                $birthday = $this->getFu()->getFacebookUserData()->getBirthday();
                if (is_a($birthday, "date") || is_a($birthday, "DateTime")) {

                    $contacto->setNacimiento($birthday);
                }

                $this->getEm()->persist($contacto);
                $this->getEm()->flush();
                $this->contacto = $contacto;
                return $this->contacto;
            }
        } else {
            return $this->contacto;
        }
        return null;
    }

    protected function getFormConsulta()
    {
        $form = $this->formBuilder($this->getEm(), 'Eventos\Entity\Consulta', true, true);
        if ($this->getEvento()) {
            $form->get("evento")->setValue($this->getEvento()->getId());
        }
        $form->get("submitbtn")->setValue("Enviar");
        return $form;
    }


    protected function verificarPropietarioEvento()
    {
        if ($this->obtenerContacto() && $this->getEvento() && $this->getEvento()->getContacto()) {
            if ($this->obtenerContacto()->getId() == $this->getEvento()->getContacto()->getId()) {
                return true;
            }
        }
        return false;
    }

    protected function definirEstadoEvento()
    {

        if ($this->getEvento()) {
            if ($this->obtenerContacto()) {

                if ($this->obtenerContacto()->getId() == $this->getEvento()->getContacto()->getId()) {
                    //OWNER
                    $this->getEvento()->setEstado(Evento::OWNER);
                } else {
                    //GUEST
                    $this->getEvento()->setEstado(Evento::GUEST);
                }

            } else {
                //NOBODY
                $this->getEvento()->setEstado(Evento::NOBODY);
            }
        }
    }


    protected function handleGuest($evento)
    {
        $contacto = $this->obtenerContacto();
        if ($contacto) {
            $contactoConfirmado = $this->getContactoConfirmadoRepository()->findOneBy(["contacto" => $contacto, "evento" => $evento]);
            if (!$contactoConfirmado) {
                $contactoConfirmado = new ContactoConfirmado();
                $contactoConfirmado->setContacto($contacto);
                $contactoConfirmado->setEvento($evento);
                $this->getEm()->persist($contactoConfirmado);
                $this->getEm()->flush();
            }
        }

    }

    protected function handleOwner($evento)
    {
        if ($evento && $evento->getContacto() == null) {
            $contacto = $this->obtenerContacto();
            if ($contacto) {
                $evento->setContacto($contacto);
                $this->getEm()->persist($evento);
                $this->getEm()->flush();
            }
        }
    }

    public function getEventoRepository()
    {
        return $this->getEm()->getRepository('\\Eventos\\Entity\\Evento');
    }

    public function getContactoRepository()
    {
        return $this->getEm()->getRepository('\\Eventos\\Entity\\Contacto');
    }

    public function getContactoConfirmadoRepository()
    {
        return $this->getEm()->getRepository('\\Eventos\\Entity\\ContactoConfirmado');
    }

    public function getInvitadoRepository()
    {
        return $this->getEm()->getRepository('\\Eventos\\Entity\\Invitado');
    }

    /**
     * @return FacebookUser
     */
    public function getFu()
    {
        return $this->fu;
    }

    /**
     * @param FacebookUser $fu
     */
    public function setFu($fu)
    {
        $this->fu = $fu;
    }


    /**
     * @return GoogleUser
     */
    public function getGu()
    {
        return $this->gu;
    }

    /**
     * @param GoogleUser $gu
     */
    public function setGu($gu)
    {
        $this->gu = $gu;
    }




    private function showUserData($facebookUserData)
    {
        $facebookUserData = $this->getfacebookUserDataStorage()->read();
        echo "<pre>";
        var_dump($facebookUserData->getId());
        var_dump($facebookUserData->getEmail());
        var_dump($facebookUserData->getFirstName());
        var_dump($facebookUserData->getLastName());
        var_dump($facebookUserData->getName());
        var_dump($facebookUserData->getBirthday());
        var_dump($facebookUserData->getLocation());
        var_dump($facebookUserData->getLink());
        var_dump($facebookUserData->getGender());
        var_dump($facebookUserData->getPicture());
        echo "</pre>";
    }

}

