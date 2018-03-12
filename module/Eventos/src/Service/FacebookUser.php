<?php

namespace Eventos\Service;

use Zend\Authentication\Storage\Session;


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
     * @var \Facebook\GraphNodes\GraphUser
     */
    private $facebookUserData = null;


    /**
     * @var \Zend\Authentication\Storage\Session
     */
    private $facebookUserDataStorage = null;

    private $accessToken = null;

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

    public function requestData(){
        $status = false;
        if ($this->accessToken) {
            $facebookUserData = $this->getFb()->get('/me?locale=en_US&fields=id,name,email,picture,first_name,last_name,birthday', $this->accessToken)->getGraphUser();
            $this->getFacebookUserDataStorage()->write($facebookUserData);
            $status = true;
        }
        return $status;
    }

    public function requestToken(){
        echo "token";
        $status = false;
        $helper = $this->getFb()->getRedirectLoginHelper();
        try {
            $this->accessToken = $helper->getAccessToken();
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
        }
        echo "token2";
        if ($this->accessToken) {
            $this->getFb()->setDefaultAccessToken((string)$this->accessToken);
            $status = true;
        }

        return $status;
    }

    public function getRedirectLoginHelper(){
       return $this->getFb()->getRedirectLoginHelper();
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


    /**
     * @return Session
     */
    public function getFacebookUserDataStorage()
    {
        if (!$this->facebookUserDataStorage) {
            $this->facebookUserDataStorage = new Session('FacebookUserData');
        }
        return $this->facebookUserDataStorage;
    }


    public function getFacebookUserData()
    {
        if (!$this->facebookUserData) {
            $this->facebookUserData = $this->getfacebookUserDataStorage()->read();
        }
        return $this->facebookUserData;
    }



}