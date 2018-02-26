<?php

namespace Eventos\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * EventoControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class EventoControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        /* @var $grid \ZfMetal\Datagrid\Grid */
        $grid = $container->build("zf-metal-datagrid", ["customKey" => "eventos-entity-evento"]);
        return new \Eventos\Controller\EventoController($em,$grid);
    }


}

