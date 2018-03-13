<?php

namespace Landing\Controller;

use Eventos\Entity\Invitado;
use Zend\View\Model\JsonModel;

/**
 * InvitadosController
 *
 *
 *
 * @author
 * @license
 * @link
 */
class InvitadosController extends BaseController
{

    const ENTITY = '\\Eventos\\Entity\\Invitado';


    public function getEntityRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
    }


    public function addInvitadoAction()
    {
        $result["status"] = false;
        $result["evento"] = $this->getEvento()->getNombre();
        $result["contacto"] = $this->obtenerContacto()->getNombre();

        if ($this->verificarPropietarioEvento()) {
            $form = $this->formBuilder($this->getEm(), Invitado::class);
            if ($this->getRequest()->isPost()) {
                $data = $this->getRequest()->getPost();
                $form->setData($data);
                if ($form->isValid($data)) {
                    $invitado = new Invitado();
                    $invitado->setNombre($data["nombre"]);
                    $invitado->setCelular($data["celular"]);
                    $invitado->setEmail($data["email"]);
                    $invitado->setEvento($this->getEvento());

                    $this->getEm()->persist($invitado);
                    $this->getEm()->flush();
                    $result["status"] = true;
                    $result["id"] = $invitado->getId();

                }
            }

        } else {
            //throw new \Exception("Propietario no valido...");
            $result["message"] = "Propietario no valido";
        }

        return new JsonModel($result);

    }

    public function delInvitadoAction()
    {
        $result["status"] = false;
        $result["evento"] = $this->getEvento()->getNombre();
        $result["contacto"] = $this->obtenerContacto()->getNombre();

        if ($this->verificarPropietarioEvento()) {
            if ($this->getRequest()->isPost()) {
                $data = $this->getRequest()->getPost();
                $invitado = $this->getInvitadoRepository()->find($data["id"]);
                if ($invitado) {
                    $this->getEm()->remove($invitado);
                    $this->getEm()->flush();
                    $result["status"] = true;
                }
            }
        } else {
            //throw new \Exception("Propietario no valido...");
            $result["message"] = "Propietario no valido";
        }

        return new JsonModel($result);

    }


}

