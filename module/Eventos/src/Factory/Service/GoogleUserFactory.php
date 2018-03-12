<?php

namespace Eventos\Factory\Service;

use Eventos\Service\GoogleUser;
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
class GoogleUserFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var $eo \Eventos\Options\ModuleOptions */
        $eo = $container->get('Eventos.options');
        return new GoogleUser($eo->getGoogleClientCredentialPath());
    }


}

