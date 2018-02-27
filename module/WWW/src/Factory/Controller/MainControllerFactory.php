<?php

namespace WWW\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * MainControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class MainControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        return new \WWW\Controller\MainController();
    }


}

