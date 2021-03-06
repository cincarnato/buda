<?php

return array(
    'controllers' => array(
        'factories' => array(
            \Eventos\Controller\LugarController::class => \Eventos\Factory\Controller\LugarControllerFactory::class,
            \Eventos\Controller\FlyerController::class => \Eventos\Factory\Controller\FlyerControllerFactory::class,
            \Eventos\Controller\FotosController::class => \Eventos\Factory\Controller\FotosControllerFactory::class,
            \Eventos\Controller\DetalleEventoController::class => \Eventos\Factory\Controller\DetalleEventoControllerFactory::class,
            \Eventos\Controller\EventoController::class => \Eventos\Factory\Controller\EventoControllerFactory::class,
            \Eventos\Controller\ContactoController::class => \Eventos\Factory\Controller\ContactoControllerFactory::class,
            \Eventos\Controller\InvitadoController::class => \Eventos\Factory\Controller\InvitadoControllerFactory::class,
            \Eventos\Controller\MainController::class => \Eventos\Factory\Controller\MainControllerFactory::class,
            \Eventos\Controller\ConsultaController::class => \Eventos\Factory\Controller\ConsultaControllerFactory::class,
            \Eventos\Controller\CorreoDestinoConsultaController::class => \Eventos\Factory\Controller\CorreoDestinoConsultaControllerFactory::class,
            \Eventos\Controller\AyudaController::class => \Eventos\Factory\Controller\AyudaControllerFactory::class,
        ),
    ),
);