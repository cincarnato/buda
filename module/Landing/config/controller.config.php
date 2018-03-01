<?php

return array(
    'controllers' => array(
        'factories' => array(
            \Landing\Controller\MainController::class => \Landing\Factory\Controller\MainControllerFactory::class,
            \Landing\Controller\InfoController::class => \Landing\Factory\Controller\InfoControllerFactory::class,
        ),
    ),
);