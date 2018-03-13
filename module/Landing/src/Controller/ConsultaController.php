<?php

namespace Landing\Controller;

use Eventos\Entity\Consulta;
use Zend\View\Model\JsonModel;

/**
 * ConsultaController
 *
 *
 *
 * @author
 * @license
 * @link
 */
class ConsultaController extends BaseController
{

    const ENTITY = '\\Eventos\\Entity\\Consulta';


    public function getEntityRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }


    public function registerAction()
    {
        $form = $this->getFormConsulta();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $consulta = new Consulta();
                $consulta->setNombre($data["nombre"]);
                $consulta->setEmail($data["email"]);
                $consulta->setMensaje($data["mensaje"]);
                $evento = $this->getEventoRepository()->find($data["evento"]);
                $consulta->setEvento($evento);


                $this->getEm()->persist($consulta);
                $this->getEm()->flush();
                $result["status"] = true;
            } else {
                $result["status"] = false;

            }
        }
        return new JsonModel($result);
    }

    public function enviarMail($consulta){
        $this->mailManager()->setTemplate('landing/mail/consulta', ["consulta" => $consulta]);
        $this->mailManager()->setFrom('ci.sys@gmail.com');

        //$this->mailManager()->addTo($user->getEmail(), $user->getName());

        $this->mailManager()->setSubject('Consulta de evento'. $consulta->getEvento()->getNombre());

        if ($this->mailManager()->send()) {
            return true;
        } else {
            $this->logger()->err("Falla al enviar mail al usuario al notificar confirmación.");
            return false;
        }
    }

}

