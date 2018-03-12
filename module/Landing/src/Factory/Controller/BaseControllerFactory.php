<?php

namespace Landing\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * BaseControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class BaseControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        $fu = $container->get(\Eventos\Service\FacebookUser::class);
        $gu = $container->get(\Eventos\Service\GoogleUser::class);
        return new \Landing\Controller\BaseController($em,$fu,$gu);
    }


}

