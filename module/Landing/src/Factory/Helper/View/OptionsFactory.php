<?php

namespace Landing\Factory\Helper\View;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * OptionsFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class OptionsFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $servicio = $container->get('Landing.options');
        return new \Landing\Helper\View\Options($servicio);
    }


}

