<?php

define('L_BUDA_URL','up.buda.int');

return [
    'router' => [
        'routes' => [
            'HostLanding' => [
                'type' => 'Zend\Router\Http\Hostname',
                'options' => [
                    'route' => L_BUDA_URL,
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
                                'controller' => \Landing\Controller\MainController::CLASS,
                                'action' => 'start',
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
                                'controller' => \Landing\Controller\MainController::CLASS,
                                'action' => 'start',
                            ],
                        ],
                        'child_routes' => [
                            'Start' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/start',
                                    'defaults' => [
                                        'controller' => \Landing\Controller\MainController::CLASS,
                                        'action' => 'start',
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