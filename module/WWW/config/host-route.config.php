<?php

define('WWW_BUDA_URL','wwww.buda.int');

return [
    'router' => [
        'routes' => [
            'WWW' => [
                'type' => 'Zend\Router\Http\Hostname',
                'options' => [
                    'route' => WWW_BUDA_URL,
                    'defaults' => [
                        'controller' => \WWW\Controller\MainController::CLASS,
                        'action' => 'home',
                    ],
                ],
                'child_routes' => [
                    'index' => [
                        'type' => 'Zend\Router\Http\Literal',
                        'options' => [
                            'route' => '/',
                            'defaults' => [
                                'controller' => \WWW\Controller\MainController::CLASS,
                                'action' => 'home',
                            ],
                        ],
                        'may_terminate' => true,
                    ],

                ],
            ],
        ],
    ],
];