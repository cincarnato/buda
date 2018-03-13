<?php

namespace Eventos\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * AyudaControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class AyudaControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        return new \Eventos\Controller\AyudaController();
    }


}

