<?php
namespace Eventos\Util;

class EventoLogin
{
    const NOBODY = 0;
    const OWNER = 1;
    const GUEST = 2;

    const FACEBOOK = "Facebook";
    const GOOGLE = "Google";
    const MANUAL = "Manual";

    protected $rol = '';
    protected $medio = "";
    protected $usuario = null;

    /**
     * EventoLogin constructor.
     */
    public function __construct()
    {
        $this->rol = self::NOBODY;
    }


    public function getRolString()
    {
        switch ($this->rol) {
            case 0:
                $s = "Visitante";
                break;
            case 1:
                $s = "Propietario";
                break;
            case 2:
                $s = "Invitado";
                break;
            default:
                $s = "Visitante";
        }

        return $s;
    }


    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    /**
     * @return string
     */
    public function getMedio()
    {
        return $this->medio;
    }

    /**
     * @param string $medio
     */
    public function setMedio($medio)
    {
        $this->medio = $medio;
    }

    /**
     * @return null
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param null $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    
    


}