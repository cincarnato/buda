<?php

namespace Eventos\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * FlyerRepository
 * 
 * 
 * 
 * @author
 * @license
 * @link
 */
class FlyerRepository extends EntityRepository
{

    public function save(\Eventos\Entity\Flyer $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Eventos\Entity\Flyer $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

