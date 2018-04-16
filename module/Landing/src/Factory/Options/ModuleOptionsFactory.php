<?php

namespace Landing\Factory\Options;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * ModuleOptionsFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class ModuleOptionsFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');
         return new \Landing\Options\ModuleOptions(isset($config['Landing.options']) ? $config['Landing.options'] : array());
    }


}

