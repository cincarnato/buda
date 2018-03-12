<?php

namespace Landing\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * ConsultaControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class ConsultaControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        $fu = $container->get(\Eventos\Service\FacebookUser::class);
        $gu = $container->get(\Eventos\Service\GoogleUser::class);
        return new \Landing\Controller\ConsultaController($em,$fu,$gu);
    }


}

