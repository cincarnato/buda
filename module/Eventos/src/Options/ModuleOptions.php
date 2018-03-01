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


}

