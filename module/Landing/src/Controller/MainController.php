<?php

namespace Landing\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * MainController
 * 
 * 
 * 
 * @author
 * @license
 * @link
 */
class MainController extends AbstractActionController
{

    const ENTITY = '\\Eventos\\Entity\\Evento';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    public function startAction()
    {
        $this->layout()->setTemplate('landing/layout');

        $id = $this->params("id");
        $name = $this->params("name");


        if($id){
            $evento = $this->getEventosRepository()->find($id);
        }else if($name){
            $evento = $this->getEventosRepository()->findOneByNombre($name);
        }

        return ["evento" => $evento];
    }

    public function getEm()
    {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEventosRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }


}

