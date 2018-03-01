<?php

namespace Landing\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * InfoController
 *
 *
 *
 * @author
 * @license
 * @link
 */
class InfoController extends AbstractActionController
{

    public function politicaPrivacidadAction()
    {
        $this->layout()->setTemplate('landing/layout');
        return [];
    }

    public function condicionesUsoAction()
    {
        $this->layout()->setTemplate('landing/layout');
        return [];
    }


}

