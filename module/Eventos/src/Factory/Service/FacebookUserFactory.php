<?php

namespace Eventos\Factory\Service;

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
class FacebookUserFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var $eo \Eventos\Options\ModuleOptions */
        $eo = $container->get('Eventos.options');
        return new \Eventos\Service\FacebookUser($eo->getFacebookAppId(), $eo->getFacebookAppSecret(), $eo->getFacebookDefaultGraphVersion(), $eo->getFacebookDefaultAccessToken());
    }


}

