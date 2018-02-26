<?php

namespace Landing\Controller;

use Zend\Mvc\Controller\AbstractActionController;

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

    public function startAction()
    {
        $this->layout()->setTemplate('landing/layout');
        return [];
    }


}

