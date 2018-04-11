<?php

namespace Landing\Options;

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

    private $facebookLogin = 'true';

    private $googleLogin = 'true';

    public function getFacebookLogin()
    {
        return $this->facebookLogin;
    }

    public function setFacebookLogin($facebookLogin)
    {
        $this->facebookLogin= $facebookLogin;
    }

    public function getGoogleLogin()
    {
        return $this->googleLogin;
    }

    public function setGoogleLogin($googleLogin)
    {
        $this->googleLogin= $googleLogin;
    }


}

