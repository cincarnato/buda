<?php

namespace Eventos\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CorreoDestinoConsultaRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class CorreoDestinoConsultaRepository extends EntityRepository
{

    public function save(\Eventos\Entity\CorreoDestinoConsulta $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Eventos\Entity\CorreoDestinoConsulta $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

