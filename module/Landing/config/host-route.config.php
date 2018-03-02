<?php


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
                    'start' => [
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
                        ],
                    ],
                    'FacebookCallback' => [
                        'type' => 'Segment',
                        'mayTerminate' => true,
                        'options' => [
                            'route' => '/facebook-callback/:name',
                            'defaults' => [
                                'controller' => \Landing\Controller\MainController::CLASS,
                                'action' => 'facebookCallback',
                            ],
                        ],
                    ],
                    'FacebookLogout' => [
                        'type' => 'Segment',
                        'mayTerminate' => true,
                        'options' => [
                            'route' => '/facebook-logout',
                            'defaults' => [
                                'controller' => \Landing\Controller\MainController::CLASS,
                                'action' => 'facebookLogout',
                            ],
                        ],
                    ],
                    'Info' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/info',
                            'defaults' => [
                                'controller' => \Landing\Controller\InfoController::CLASS,
                                'action' => 'politicaPrivacidad',
                            ],
                        ],
                        'child_routes' => [
                            'PoliticaPrivacidad' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/politica-privacidad',
                                    'defaults' => [
                                        'controller' => \Landing\Controller\InfoController::CLASS,
                                        'action' => 'politicaPrivacidad',
                                    ],
                                ],
                            ],
                            'CondicionesUso' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/condiciones-uso',
                                    'defaults' => [
                                        'controller' => \Landing\Controller\InfoController::CLASS,
                                        'action' => 'condicionesUso',
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