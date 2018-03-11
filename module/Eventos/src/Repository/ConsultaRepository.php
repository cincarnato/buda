<?php

namespace Eventos\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ConsultaRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class ConsultaRepository extends EntityRepository
{

    public function save(\Eventos\Entity\Consulta $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Eventos\Entity\Consulta $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

