<?php

namespace Eventos\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * EventoController
 *
 *
 *
 * @author
 * @license
 * @link
 */
class EventoController extends AbstractActionController
{

    const ENTITY = '\\Eventos\\Entity\\Evento';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    /**
     * @var \ZfMetal\Datagrid\Grid
     */
    public $grid = null;

    public function getEm()
    {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEntityRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em, \ZfMetal\Datagrid\Grid $grid)
    {
        $this->em = $em;
         $this->grid = $grid;
    }

    public function getGrid()
    {
        return $this->grid;
    }

    public function setGrid(\ZfMetal\Datagrid\Grid $grid)
    {
        $this->grid = $grid;
    }

    public function gridAction()
    {
        $http = "http://".L_BUDA_URL."/{{nombre}}";
        $this->grid->addExtraColumn("link","<a target='blank' href='".$http."'>".$http."</a>", "right");
        $this->grid->prepare();
        return array("grid" => $this->grid);
    }


}

