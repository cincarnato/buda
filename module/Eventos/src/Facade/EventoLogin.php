<?php

namespace Eventos\Facade;

use Eventos\Entity\Contacto;
use Zend\Authentication\Storage\Session;

class EventoLogin
{

    public static function getEventoLogin()
    {
        $sourceLoginStorage = new Session("EventoLogin");
        if (!$sourceLoginStorage->read()) {
            $el = new \Eventos\Util\EventoLogin();
            $sourceLoginStorage->write($el);
        }
        return $sourceLoginStorage;
    }

    public static function setRol($rol)
    {
        self::getEventoLogin()->read()->setRol($rol);
    }

    public static function setMedio($medio)
    {
        self::getEventoLogin()->read()->setMedio($medio);
    }

    public static function setUsuario(Contacto $usuario)
    {
        self::getEventoLogin()->read()->setUsuario($usuario);
    }

    public static function getRol()
    {
        return self::getEventoLogin()->read()->getRol();
    }

    public static function getRolString()
    {
        return self::getEventoLogin()->read()->getRolString();
    }

    public static function getMedio()
    {
        return self::getEventoLogin()->read()->getMedio();
    }

    public static function getUsuario()
    {
        return self::getEventoLogin()->read()->getUsuario();
    }

}