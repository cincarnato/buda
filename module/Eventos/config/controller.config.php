<?php

return array(
    'controllers' => array(
        'factories' => array(
            \Eventos\Controller\LugarController::class => \Eventos\Factory\Controller\LugarControllerFactory::class,
            \Eventos\Controller\FlyerController::class => \Eventos\Factory\Controller\FlyerControllerFactory::class,
        ),
    ),
);