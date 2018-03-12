<?php

return array(
    'controllers' => array(
        'factories' => array(
            \Landing\Controller\MainController::class => \Landing\Factory\Controller\MainControllerFactory::class,
            \Landing\Controller\InfoController::class => \Landing\Factory\Controller\InfoControllerFactory::class,
            \Landing\Controller\InvitadosController::class => \Landing\Factory\Controller\InvitadosControllerFactory::class,
            \Landing\Controller\BaseController::class => \Landing\Factory\Controller\BaseControllerFactory::class,
            \Landing\Controller\ConsultaController::class => \Landing\Factory\Controller\ConsultaControllerFactory::class,
        ),
    ),
);