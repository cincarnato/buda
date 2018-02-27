<?php

namespace WWW\Controller;

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

    public function homeAction()
    {
        $this->layout()->setTemplate('www/layout');
        return [];
    }


}

