<?php

namespace Eventos\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LugarRepository
 * 
 * 
 * 
 * @author
 * @license
 * @link
 */
class LugarRepository extends EntityRepository
{

    public function save(\Eventos\Entity\Lugar $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Eventos\Entity\Lugar $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

