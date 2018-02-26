<?php

namespace Landing;

/**
 * Module
 *
 *
 *
 * @author
 * @license
 * @link
 */
class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(\Zend\Mvc\MvcEvent $mvcEvent)
    {

    }

    public function onRoute(\Zend\Mvc\MvcEvent $mvcEvent)
    {
        $routeMatch = $mvcEvent->getRouteMatch();
        echo $routeMatch;
        die;
    }
}

