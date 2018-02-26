<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        if (!$this->identity()) {
            $this->redirect()->toUrl("/user/login");
        }
    }
}
