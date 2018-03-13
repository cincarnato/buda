<?php

return [
    'router' => [
        'routes' => [
            'HostLanding' => [
                'type' => 'Zend\Router\Http\Hostname',
                'may_terminate' => true,
                'options' => [
                    'route' => E_BUDA_URL,
                    'defaults' => [
                        'controller' => \Landing\Controller\MainController::CLASS,
                        'action' => 'start',
                    ],

                ],
                'child_routes' => [
                    'index' => [
                        'type' => 'Zend\Router\Http\Literal',
                        'options' => [
                            'route' => '/',
                            'defaults' => [
                                'controller' => \Eventos\Controller\MainController::CLASS,
                                'action' => 'home',
                            ],
                        ],
                        'may_terminate' => true,
                    ],
                    'Main' => [
                        'type' => 'Literal',
                        'mayTerminate' => true,
                        'options' => [
                            'route' => '/main',
                            'defaults' => [
                                'controller' => \Eventos\Controller\MainController::CLASS,
                                'action' => 'home',
                            ],
                        ],
                        'child_routes' => [
                            'Start' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/start',
                                    'defaults' => [
                                        'controller' => \Eventos\Controller\MainController::CLASS,
                                        'action' => 'home',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];