<?php

namespace Landing\Controller;

use Doctrine\ORM\EntityManager;
use Eventos\Entity\Consulta;
use Eventos\Entity\ContactoConfirmado;
use Eventos\Entity\Evento;
use Facebook\Helpers\FacebookRedirectLoginHelper;
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
class MainController extends BaseController
{

    const ENTITY = '\\Eventos\\Entity\\Evento';

    /**
     * @var EntityManager
     */
    public $em = null;



    /**
     * @var \Zend\Authentication\Storage\Session
     */
    private $stateStorage = null;

    /**
     * @var \Zend\Authentication\Storage\Session
     */
    private $googleCodeStorage = null;


    public function startAction()
    {
        $this->layout()->setTemplate('landing/layout');

        $evento = $this->getEvento();


        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            //Validar Clave
            if ($evento && $data["clave"] == $evento->getClave()) {

                //LOGIN TYPE "f|g"
                if ($data["logintype"] == "f") {
                    /** @var  $helper FacebookRedirectLoginHelper */
                    $helper = $this->getFu()->getRedirectLoginHelper();
                    $permisos = ['email', 'user_birthday'];
                    $url = $this->url()->fromRoute('HostLanding/FacebookCallback', [], ['force_canonical' => true]);
                    $loginUrl = $helper->getLoginUrl($url, $permisos);
                    $state = $helper->getPersistentDataHandler()->get('state');
                    $this->getStateStorage($state)->write($evento->getNombre());
                    $this->redirect()->toUrl($loginUrl);
                }

                if ($data["logintype"] == "g") {
                    if (!$this->getGu()->getAccessToken()) {
                        $auth_url = $this->getGu()->getGc()->createAuthUrl();
                        $this->getGoogleCodeStorage("google_event")->write($evento->getNombre());
                        $this->redirect()->toUrl($auth_url);
                    }

                }

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


    public function googleLogoutAction()
    {
        $this->getGu()->clearToken();
        $this->getGu()->clearUserData();
        return $this->redirect()->toRoute('HostLanding/start');
    }

    public function googleCallbackAction()
    {
        $this->layout()->setTemplate('landing/layout');
        $code = $this->getRequest()->getQuery("code");

        if (!$code) {
            $auth_url = $this->getGu()->createAuthUrl();
            $this->redirect()->toUrl($auth_url);
        } else {
            $this->getGu()->fetchAccessTokenWithAuthCode($code);
            $this->getGu()->requestAccessToken();
            $this->getGu()->requestData();


            $name = $this->getGoogleCodeStorage("google_event")->read();
            return $this->redirect()->toRoute('HostLanding/start/byname', ["name" => $name], ['force_canonical' => true]);
        }

    }

    public function facebookLogoutAction()
    {
        $this->getFu()->getFacebookUserDataStorage()->clear();
        return $this->redirect()->toRoute('HostLanding/start');
    }

    public function facebookCallbackAction()
    {
        $this->layout()->setTemplate('landing/layout');
        $this->getFu()->requestToken();
        $this->getFu()->requestData();

        //Recuperar el ID del evento
        $state = $this->getRequest()->getQuery("state");
        $name = $this->getStateStorage($state)->read();

        return $this->redirect()->toRoute('HostLanding/start/byname', ["name" => $name], ['force_canonical' => true]);
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

    /**
     * @return \Zend\Authentication\Storage\Session
     */
    private function getGoogleCodeStorage($code)
    {
        if (!$this->googleCodeStorage) {
            $this->googleCodeStorage = new Session($code);
        }
        return $this->googleCodeStorage;
    }




}

