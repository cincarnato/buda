<?php

namespace Application;

use Zend\ModuleManager\Feature\ConfigProviderInterface;


class Module implements ConfigProviderInterface {


    public function getConfig() {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onRoute(\Zend\Mvc\MvcEvent $mvcEvent)
    {
        $routeMatch = $mvcEvent->getRouteMatch();
        echo $routeMatch;
        die;
    }

}
