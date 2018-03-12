<?php

namespace Landing\Controller;

use Eventos\Entity\Consulta;
use Eventos\Entity\Contacto;
use Eventos\Entity\ContactoConfirmado;
use Eventos\Entity\Evento;
use Eventos\Entity\Invitado;
use Facebook\Helpers\FacebookRedirectLoginHelper;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Authentication\Storage\Session;
use Zend\View\Model\JsonModel;

/**
 * MainController
 *
 *
 *
 * @author
 * @license
 * @link
 */
class MainController extends AbstractActionController
{

    const ENTITY = '\\Eventos\\Entity\\Evento';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em = null;

    /**
     * @var \Eventos\Service\FacebookUser
     */
    private $fu = null;

    /**
     * @var \Zend\Authentication\Storage\Session
     */
    private $userDataStorage = null;

    /**
     * @var \Zend\Authentication\Storage\Session
     */
    private $stateStorage = null;

    /**
     * @var \Facebook\GraphNodes\GraphUser
     */
    private $facebookUserData = null;

    /**
     * @var Contacto
     */
    private $contacto = null;

    /**
     * @var Evento
     */
    private $evento = null;

    public function consultaAction()
    {
        $form = $this->getFormConsulta();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $consulta = new Consulta();
                $consulta->setNombre($data["nombre"]);
                $consulta->setEmail($data["email"]);
                $consulta->setMensaje($data["mensaje"]);
                $evento = $this->getEventoRepository()->find($data["evento"]);
                $consulta->setEvento($evento);


                $this->getEm()->persist($consulta);
                $this->getEm()->flush();
                $result["status"] = true;
            } else {
                $result["status"] = false;

            }
        }
        return new JsonModel($result);
    }

    public function addInvitadoAction()
    {
        $result["status"] = false;
        $result["evento"] = $this->getEvento()->getNombre();
        $result["contacto"] = $this->obtenerContacto()->getNombre();

        if ($this->verificarPropietarioEvento()) {

            $form = $this->formBuilder($this->getEm(), Invitado::class);

            if ($this->getRequest()->isPost()) {
                $data = $this->getRequest()->getPost();
                $form->setData($data);
                if ($form->isValid($data)) {
                    $invitado = new Invitado();
                    $invitado->setNombre($data["nombre"]);
                    $invitado->setCelular($data["celular"]);
                    $invitado->setEmail($data["email"]);
                    $invitado->setEvento($this->getEvento());

                    $this->getEm()->persist($invitado);
                    $this->getEm()->flush();
                    $result["status"] = true;
                    $result["id"] = $invitado->getId();

                }
            }

        } else {
            //throw new \Exception("Propietario no valido...");
            $result["message"] = "Propietario no valido";
        }

        return new JsonModel($result);

    }

    public function delInvitadoAction()
    {
        $result["status"] = false;
        $result["evento"] = $this->getEvento()->getNombre();
        $result["contacto"] = $this->obtenerContacto()->getNombre();

        if ($this->verificarPropietarioEvento()) {

            if ($this->getRequest()->isPost()) {
                $data = $this->getRequest()->getPost();
                $invitado = $this->getInvitadoRepository()->find($data["id"]);
                if ($invitado) {
                    $this->getEm()->remove($invitado);
                    $this->getEm()->flush();
                    $result["status"] = true;
                }
            }

        } else {
            //throw new \Exception("Propietario no valido...");
            $result["message"] = "Propietario no valido";
        }

        return new JsonModel($result);

    }


    public function startAction()
    {
        $this->layout()->setTemplate('landing/layout');

        $evento = $this->getEvento();


        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            //Validar Clave
            if ($evento && $data["clave"] == $evento->getClave()) {

                /** @var  $helper FacebookRedirectLoginHelper */
                $helper = $this->getFu()->getRedirectLoginHelper();
                $permisos = ['email', 'user_birthday'];
                $url = $this->url()->fromRoute('HostLanding/FacebookCallback', [], ['force_canonical' => true]);
                $loginUrl = $helper->getLoginUrl($url, $permisos);
                $state = $helper->getPersistentDataHandler()->get('state');
                $this->getStateStorage($state)->write($evento->getNombre());
                $this->redirect()->toUrl($loginUrl);
            } else {
                $this->flashMessenger()->addErrorMessage('Clave incorrecta');
            }
        }

        //Owner (Propietario)
        $this->handleOwner($evento);
        //Guest (invitado-Contacto confirmado)
        $this->handleGuest($evento);

        $this->definirEstadoEvento();

        return ["evento" => $evento, "formConsulta" => $this->getFormConsulta()];
    }


    private function getFormConsulta()
    {
        $form = $this->formBuilder($this->getEm(), 'Eventos\Entity\Consulta',true,true);
        if ($this->getEvento()) {
            $form->get("evento")->setValue($this->getEvento()->getId());
        }
        $form->get("submitbtn")->setValue("Enviar");
        return $form;
    }

    public function getEvento()
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

    private function verificarPropietarioEvento()
    {
        if ($this->obtenerContacto() && $this->getEvento() && $this->getEvento()->getContacto()) {
            if ($this->obtenerContacto()->getId() == $this->getEvento()->getContacto()->getId()) {
                return true;
            }
        }
        return false;
    }

    private function definirEstadoEvento()
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


    private function handleGuest($evento)
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

    private function handleOwner($evento)
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

    private function getFacebookUserData()
    {
        if (!$this->facebookUserData) {
            $this->facebookUserData = $this->getUserDataStorage()->read();
        }
        return $this->facebookUserData;
    }

    /**
     * @return Contacto|null
     */
    private function obtenerContacto()
    {
        if (!$this->contacto) {
            if ($this->getFacebookUserData()) {
                $contacto = $this->getContactoRepository()->findOneByEmail($this->getFacebookUserData()->getEmail());

                if (!$contacto) {
                    $contacto = new Contacto();
                }

                $contacto->setNombreCompleto($this->getFacebookUserData()->getName());
                $contacto->setEmail($this->getFacebookUserData()->getEmail());
                $contacto->setFacebookId($this->getFacebookUserData()->getId());
                $contacto->setFacebookUrl($this->getFacebookUserData()->getLink());
                $contacto->setNombre($this->getFacebookUserData()->getFirstName());
                $contacto->setApellido($this->getFacebookUserData()->getLastName());

                $birthday = $this->getFacebookUserData()->getBirthday();
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

    public function facebookCallbackAction()
    {
        $this->layout()->setTemplate('landing/layout');
        $helper = $this->getFu()->getRedirectLoginHelper();
        try {
            $accessToken = $helper->getAccessToken();
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if ($accessToken) {
            $this->getFu()->getFb()->setDefaultAccessToken((string)$accessToken);
            $facebookUserData = $this->getFu()->getFb()->get('/me?locale=en_US&fields=id,name,email,picture,first_name,last_name,birthday', $accessToken)->getGraphUser();
            $this->getUserDataStorage()->write($facebookUserData);

        } else {
            $this->flashMessenger()->addErrorMessage('No se aceptaron los permisos requeridos.');
        }

        //Recuperar el ID del evento
        $state = $this->getRequest()->getQuery("state");
        $name = $this->getStateStorage($state)->read();

        return $this->redirect()->toRoute('HostLanding/start/byname', ["name" => $name], ['force_canonical' => true]);
    }

    public function facebookLogoutAction()
    {
        $this->getUserDataStorage()->clear();
        return $this->redirect()->toRoute('HostLanding/start');
    }

    public function getEm()
    {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return \Eventos\Service\FacebookUser
     */
    public function getFu()
    {
        return $this->fu;
    }

    /**
     * @param \Eventos\Service\FacebookUser $fu
     */
    public function setFu($fu)
    {
        $this->fu = $fu;
    }

    public function getEventoRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
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

    public function __construct(\Doctrine\ORM\EntityManager $em, \Eventos\Service\FacebookUser $fu)
    {
        $this->em = $em;
        $this->fu = $fu;
    }

    public function getEntityRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    /**
     * @return \Zend\Authentication\Storage\Session
     */
    private function getUserDataStorage()
    {
        if (!$this->userDataStorage) {
            $this->userDataStorage = new Session('FacebookUserData');
        }
        return $this->userDataStorage;
    }

    /**
     * @return \Zend\Authentication\Storage\Session
     */
    private function getStateStorage($state)
    {
        if (!$this->stateStorage) {
            $this->stateStorage = new Session($state);
        }
        return $this->stateStorage;
    }


    private function showUserData($facebookUserData)
    {
        $facebookUserData = $this->getUserDataStorage()->read();
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

