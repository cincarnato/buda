<?php

namespace Eventos\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * InvitadoRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class InvitadoRepository extends EntityRepository
{

    public function save(\Eventos\Entity\Invitado $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Eventos\Entity\Invitado $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

