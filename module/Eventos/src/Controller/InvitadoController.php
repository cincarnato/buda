<?php

namespace Eventos\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * InvitadoController
 *
 *
 *
 * @author
 * @license
 * @link
 */
class InvitadoController extends AbstractActionController
{

    const ENTITY = '\\Eventos\\Entity\\Invitado';

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

        $idEvento = $this->params("idEvento");
        if($idEvento) {
            $this->grid->getSource()->getQb()->where("u.evento = :idEvento")->setParameter("idEvento", $idEvento);
        }

        $this->grid->prepare();
        return array("grid" => $this->grid);
    }


}

