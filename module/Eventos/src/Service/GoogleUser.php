<?php

namespace Eventos\Service;

class GoogleUser
{

    const CALLBACK_PATH = "/google-callback";

    /**
     * @var \Google_Client
     */
    private $gc;

    private $pathClientCredentials = '';

    /**
     * @var \Zend\Authentication\Storage\Session
     */
    private $accessTokenStorage = null;

    /**
     * @var \Zend\Authentication\Storage\Session
     */
    private $googleUserDataStorage = null;


    /**
     * GoogleUser constructor.
     * @param string $pathClientCredentials
     */
    public function __construct($pathClientCredentials)
    {
        $this->pathClientCredentials = $pathClientCredentials;
        $this->buildGoogleClient();
    }

    public function buildGoogleClient()
    {
        $this->gc = new \Google_Client();
        $this->gc->setAuthConfig($this->pathClientCredentials);
        //$this->gc->addScope(['userinfo.email','profile','plus.me','plus.login']);
        $this->gc->addScope([\Google_Service_Oauth2::USERINFO_EMAIL, \Google_Service_Oauth2::USERINFO_PROFILE]);
        $this->gc->setRedirectUri($this->getRedirectUrl());
    }

    private function getRedirectUrl()
    {
        return "http://" . L_BUDA_URL . self::CALLBACK_PATH;
    }

    public function fetchAccessTokenWithAuthCode($code)
    {
        return $this->gc->fetchAccessTokenWithAuthCode($code);
    }

    public function requestAccessToken()
    {
        $status = false;
        try {
            $at = $this->gc->getAccessToken();
            $this->getAccessTokenStorage()->write($at);
            $status = true;
        } catch (\Exception $e) {
            return $status;
        }

        return $status;
    }

    public function getAccessToken()
    {
        return $this->getAccessTokenStorage()->read();
    }

    public function requestData()
    {
        $oauth2 = new \Google_Service_Oauth2($this->gc);
        $data = $oauth2->userinfo->get();
        $this->getGoogleUserDataStorage($data);
        return $data;
    }

    /**
     * @return \Google_Client
     */
    public function getGc()
    {
        return $this->gc;
    }

    /**
     * @param \Google_Client $gc
     */
    public function setGc($gc)
    {
        $this->gc = $gc;
    }

    /**
     * @return \Zend\Authentication\Storage\Session
     */
    public function getAccessTokenStorage()
    {
        if (!$this->accessTokenStorage) {
            $this->accessTokenStorage = new \Zend\Authentication\Storage\Session('googleAccessToken');
        }
        return $this->accessTokenStorage;
    }

    public function clearToken()
    {
        $this->getAccessTokenStorage()->clear();
    }

    public function clearUserData()
    {
        $this->getGoogleUserDataStorage()->clear();
    }

    /**
     * @return \Zend\Authentication\Storage\Session
     */
    private function getGoogleUserDataStorage()
    {
        if (!$this->googleUserDataStorage) {
            $this->googleUserDataStorage = new Session('GoogleUserData');
        }
        return $this->googleUserDataStorage;
    }


}