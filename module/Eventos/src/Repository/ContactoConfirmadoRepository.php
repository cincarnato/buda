<?php

namespace Eventos\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ContactoConfirmadoRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class ContactoConfirmadoRepository extends EntityRepository
{

    public function save(\Eventos\Entity\ContactoConfirmado $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Eventos\Entity\ContactoConfirmado $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

