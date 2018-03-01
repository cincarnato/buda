<?php

namespace Landing\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * InfoControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class InfoControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        return new \Landing\Controller\InfoController();
    }


}

