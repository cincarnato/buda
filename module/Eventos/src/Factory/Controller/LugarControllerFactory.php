<?php

namespace Eventos\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * LugarControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class LugarControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        /* @var $grid \ZfMetal\Datagrid\Grid */
        $grid = $container->build("zf-metal-datagrid", ["customKey" => "eventos-entity-lugar"]);
        return new \Eventos\Controller\LugarController($em,$grid);
    }


}

