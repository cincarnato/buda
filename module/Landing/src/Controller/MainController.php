<?php

namespace Landing\Controller;

use Eventos\Entity\Contacto;
use Eventos\Entity\ContactoConfirmado;
use Facebook\Helpers\FacebookRedirectLoginHelper;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Authentication\Storage\Session;

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


    public function startAction()
    {
        $this->layout()->setTemplate('landing/layout');

        $name = $this->params("name");
        /** @var $evento \Eventos\Entity\Evento */
        if ($name) {
            $evento = $this->getEventoRepository()->findOneByNombre($name);
        }

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

        return ["evento" => $evento];
    }

    private function handleGuest($evento)
    {
        $contacto = $this->obtenerContacto();
        if ($contacto) {
            $contactoConfirmado = $this->getContactoRepository()->findOneBy(["contacto" => $contacto, "evento" => $evento]);
            if (!$contactoConfirmado) {
                $contactoConfirmado = new ContactoConfirmado();
                $contactoConfirmado->setContacto($contacto);
                $contactoConfirmado->setEvento($evento);
                $this->getEm()->persist($evento);
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

    private function obtenerContacto()
    {
        if (!$this->contacto) {
            if ($this->getFacebookUserData()) {
                $contacto = $this->getContactoRepository()->findOneByEmail($this->getFacebookUserData()->getEmail());

                if (!$contacto) {
                    $contacto = new Contacto();
                }

                $contacto->setNombre($this->getFacebookUserData()->getName());
                $contacto->setEmail($this->getFacebookUserData()->getEmail());

                $this->getEm()->persist($contacto);
                $this->getEm()->flush();
                $this->contacto = $contacto;
                return $this->contacto;
            }
        }else{
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
            $facebookUserData = $this->getFu()->getFb()->get('/me?locale=en_US&fields=id,name,email,first_name,last_name,birthday', $accessToken)->getGraphUser();
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


    protected function showUserData($facebookUserData)
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

