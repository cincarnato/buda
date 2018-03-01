<?php

namespace Eventos\Service;

class FacebookUser
{
    /**
     * @var \Facebook\Facebook
     */
    private $fb;

    private $facebookAppId = '';

    private $facebookAppSecret = '';

    private $facebookDefaultGraphVersion = '';

    private $facebookDefaultAccessToken = '';

    /**
     * FacebookUser constructor.
     * @param string $facebookAppId
     * @param string $facebookAppSecret
     * @param string $facebookDefaultGraphVersion
     * @param string $facebookDefaultAccessToken
     */
    public function __construct($facebookAppId, $facebookAppSecret, $facebookDefaultGraphVersion, $facebookDefaultAccessToken)
    {
        $this->facebookAppId = $facebookAppId;
        $this->facebookAppSecret = $facebookAppSecret;
        $this->facebookDefaultGraphVersion = $facebookDefaultGraphVersion;
        $this->facebookDefaultAccessToken = $facebookDefaultAccessToken;
        $this->buildFacebookSdk();
    }

    public function buildFacebookSdk()
    {
        $this->fb = new \Facebook\Facebook([
            'app_id' => $this->facebookAppId,
            'app_secret' => $this->facebookAppSecret,
            'default_graph_version' => $this->facebookDefaultGraphVersion,
        ]);
    }

    public function getRedirectHelper(){
       return $this->fb->getRedirectLoginHelper();
    }

    /**
     * @return string
     */
    public function getFacebookAppId()
    {
        return $this->facebookAppId;
    }

    /**
     * @param string $facebookAppId
     */
    public function setFacebookAppId($facebookAppId)
    {
        $this->facebookAppId = $facebookAppId;
    }

    /**
     * @return string
     */
    public function getFacebookAppSecret()
    {
        return $this->facebookAppSecret;
    }

    /**
     * @param string $facebookAppSecret
     */
    public function setFacebookAppSecret($facebookAppSecret)
    {
        $this->facebookAppSecret = $facebookAppSecret;
    }

    /**
     * @return string
     */
    public function getFacebookDefaultGraphVersion()
    {
        return $this->facebookDefaultGraphVersion;
    }

    /**
     * @param string $facebookDefaultGraphVersion
     */
    public function setFacebookDefaultGraphVersion($facebookDefaultGraphVersion)
    {
        $this->facebookDefaultGraphVersion = $facebookDefaultGraphVersion;
    }

    /**
     * @return string
     */
    public function getFacebookDefaultAccessToken()
    {
        return $this->facebookDefaultAccessToken;
    }

    /**
     * @param string $facebookDefaultAccessToken
     */
    public function setFacebookDefaultAccessToken($facebookDefaultAccessToken)
    {
        $this->facebookDefaultAccessToken = $facebookDefaultAccessToken;
    }

    /**
     * @return \Facebook\Facebook
     */
    public function getFb()
    {
        return $this->fb;
    }

    /**
     * @param \Facebook\Facebook $fb
     */
    public function setFb($fb)
    {
        $this->fb = $fb;
    }




}