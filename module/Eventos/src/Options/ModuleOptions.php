<?php

namespace Eventos\Options;

/**
 * ModuleOptions
 *
 *
 *
 * @author
 * @license
 * @link
 */
class ModuleOptions extends \Zend\Stdlib\AbstractOptions
{

    private $facebookAppId = '';

    private $facebookAppSecret = '';

    private $facebookDefaultGraphVersion = '';

    private $facebookDefaultAccessToken = '';

    private $googleClientCredentialPath = 'C:\Users\crist\Documents\Proyectos\CDI\buda\config\google\client_credentials.json';

    private function getDefaultPath(){
        return getcwd();
    }

    public function getFacebookAppId()
    {
        return $this->facebookAppId;
    }

    public function setFacebookAppId($facebookAppId)
    {
        $this->facebookAppId= $facebookAppId;
    }

    public function getFacebookAppSecret()
    {
        return $this->facebookAppSecret;
    }

    public function setFacebookAppSecret($facebookAppSecret)
    {
        $this->facebookAppSecret= $facebookAppSecret;
    }

    public function getFacebookDefaultGraphVersion()
    {
        return $this->facebookDefaultGraphVersion;
    }

    public function setFacebookDefaultGraphVersion($facebookDefaultGraphVersion)
    {
        $this->facebookDefaultGraphVersion= $facebookDefaultGraphVersion;
    }

    public function getFacebookDefaultAccessToken()
    {
        return $this->facebookDefaultAccessToken;
    }

    public function setFacebookDefaultAccessToken($facebookDefaultAccessToken)
    {
        $this->facebookDefaultAccessToken= $facebookDefaultAccessToken;
    }

    public function getGoogleClientCredentialPath()
    {
        return $this->googleClientCredentialPath;
    }

    public function setGoogleClientCredentialPath($googleClientCredentialPath)
    {
        $this->googleClientCredentialPath= $googleClientCredentialPath;
    }


}

