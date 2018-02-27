<?php

define('L_BUDA_URL', 'up.buda.int');

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
                        'child_routes' => [
                            'byid' => [
                                'type' => 'Zend\Router\Http\Segment',
                                'options' => [
                                    'route' => ':id',
                                    'constraints' => [
                                        'id' => '[0-9]+',
                                    ],
                                    'defaults' => [
                                        'controller' => \Landing\Controller\MainController::CLASS,
                                        'action' => 'start',
                                    ],
                                ],
                                'may_terminate' => true,
                            ],
                            'byname' => [
                                'type' => 'Zend\Router\Http\Segment',
                                'options' => [
                                    'route' => ':name',
                                    'constraints' => [
                                        'name' => '[a-zA-Z0-9_-]+',
                                    ],
                                    'defaults' => [
                                        'controller' => \Landing\Controller\MainController::CLASS,
                                        'action' => 'start',
                                    ],
                                ],
                                'may_terminate' => true,
                            ],
                        ],
                    ],

                ],

            ],
        ],
    ],
];