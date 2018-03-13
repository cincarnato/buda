<?php

namespace Eventos\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ContactoRepository
 * 
 * 
 * 
 * @author
 * @license
 * @link
 */
class ContactoRepository extends EntityRepository
{

    public function save(\Eventos\Entity\Contacto $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Eventos\Entity\Contacto $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

