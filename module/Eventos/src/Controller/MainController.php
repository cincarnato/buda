<?php

namespace Eventos\Controller;

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
        if (!$this->identity()) {
            $this->redirect()->toUrl("/user/login");
        }
    }


}

