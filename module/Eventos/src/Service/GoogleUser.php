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
        $this->gc->addScope(\Google_Service_Drive::DRIVE);
        $this->gc->setRedirectUri($this->getRedirectUrl());
    }

    private function getRedirectUrl(){
        return "http://".E_BUDA_URL.CALLBACK_PATH;
    }

    public function fetchAccessTokenWithAuthCode($code){
        return $this->gc->fetchAccessTokenWithAuthCode($code);
    }

    public function getAccessToken(){
        if($this->getAccessTokenStorage()->read()){
            $this->getAccessTokenStorage()->write($this->gc->getAccessToken());
        }

        return $this->accessTokenStorage->read();
    }

    public function getData(){
        $drive = new \Google_Service_Drive($this->gc);
        $files = $drive->files->listFiles(array())->getItems();
        return json_encode($files);
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
        if(!$this->accessTokenStorage){
            $this->accessTokenStorage = new \Zend\Authentication\Storage\Session('googleAccessToken');
        }
        return $this->accessTokenStorage;
    }









}