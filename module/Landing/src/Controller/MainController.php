<?php

namespace Landing\Controller;

use Eventos\Entity\Contacto;
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
     * @var Session
     */
    private $storage = null;

    public function startAction()
    {
        $this->layout()->setTemplate('landing/layout');

        $id = $this->params("id");
        $name = $this->params("name");
        /** @var $evento \Eventos\Entity\Evento */
        if ($id) {
            $evento = $this->getEventoRepository()->find($id);
        } else if ($name) {
            $evento = $this->getEventoRepository()->findOneByNombre($name);
        }

        if($this->getRequest()->isPost()) {
            $helper = $this->getFu()->getRedirectLoginHelper();
            $permisos = ['email', 'user_birthday'];
            $url = $this->url()->fromRoute('HostLanding/FacebookCallback', [], ['force_canonical' => true]);
            $loginUrl = $helper->getLoginUrl($url, $permisos);
            $this->redirect()->toUrl($loginUrl);
        }

        $facebookUserData = $this->getStorage()->read();

        if($evento && $evento->getContacto() == null && $facebookUserData && $facebookUserData->getEmail() ){
            $contacto = $this->crearContacto($facebookUserData);
            $evento->setContacto($contacto);
            $this->getEm()->persist($evento);
            $this->getEm()->flush();

        }

        return ["evento" => $evento];
    }

    private function crearContacto($facebookUserData, $evento){

        $contacto  = $this->getContactoRepository()->findOneByEmail($facebookUserData->getEmail());

        if(!$contacto){
            $contacto = new Contacto();
        }

        $contacto->setNombre($facebookUserData->getName());
        $contacto->setEmail($facebookUserData->getEmail());

        $this->getEm()->persist($contacto);
        $this->getEm()->flush();

        return $contacto;
    }

    public function facebookCallbackAction()
    {
        $helper = $this->getFu()->getRedirectHelper();
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
            $facebookUserData = $this->getFb()->get('/me?locale=en_US&fields=id,name,email,first_name,last_name,birthday', $accessToken)->getGraphGroup();
            $this->getStorage()->write($facebookUserData);

        } else {
            $this->flashMessenger()->addErrorMessage('No se aceptaron los permisos requeridos.');
        }

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

    public function __construct(\Doctrine\ORM\EntityManager $em, \Eventos\Service\FacebookUser $fu)
    {
        $this->em = $em;
        $this->fu = $fu;
    }

    public function getEntityRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    private function getStorage()
    {
        if (!$this->storage) {
            $this->storage = new Session('FacebookUserData');
        }
        return $this->storage;

    }


}

