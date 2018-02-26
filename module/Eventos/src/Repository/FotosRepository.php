<?php

namespace Eventos\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * FotosRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class FotosRepository extends EntityRepository
{

    public function save(\Eventos\Entity\Fotos $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Eventos\Entity\Fotos $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

