<?php

namespace Eventos\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * FlyerControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class FlyerControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        /* @var $grid \ZfMetal\Datagrid\Grid */
        $grid = $container->build("zf-metal-datagrid", ["customKey" => "eventos-entity-flyer"]);
        return new \Eventos\Controller\FlyerController($em,$grid);
    }


}

