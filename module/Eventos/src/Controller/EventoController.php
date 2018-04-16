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
        $httpLink = "http://".L_BUDA_URL."/{{nombre}}";
        $this->grid->addExtraColumn("<span  class='material-icons'  data-toggle='tooltip' data-placement='top' title='Confirmados'>face</span>","<a target='_blank' href='/eventos/contacto/confirmados/{{id}}' class='material-icons text-center'>face</a>", "right");
        $this->grid->addExtraColumn("<span  class='material-icons'  data-toggle='tooltip' data-placement='top' title='Invitados'>record_voice_over</span>","<a target='_blank' href='/eventos/invitado/evento/{{id}}' class='material-icons text-center'>record_voice_over</a>", "right");
        $this->grid->addExtraColumn("Link","<a target='_blank' href='".$httpLink."'>".$httpLink."</a>", "right");
        $this->grid->prepare();
        return array("grid" => $this->grid);
    }


}

