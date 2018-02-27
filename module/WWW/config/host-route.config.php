<?php


return [
    'router' => [
        'routes' => [
            'wow' => [
                'type' => 'Zend\Router\Http\Hostname',
                'options' => [
                    'route' => WWW_BUDA_URL,
                    'defaults' => [
                        'controller' => \WWW\Controller\MainController::CLASS,
                        'action' => 'home',
                    ],
                ],
                'child_routes' => [
                    'home' => [
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