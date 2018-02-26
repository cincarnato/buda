<?php

namespace Eventos\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * DetalleEventoRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class DetalleEventoRepository extends EntityRepository
{

    public function save(\Eventos\Entity\DetalleEvento $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Eventos\Entity\DetalleEvento $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

