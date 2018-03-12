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
                            ]

                        ],
                    ],
                    'consulta' => [
                        'type' => 'Zend\Router\Http\Literal',
                        'options' => [
                            'route' => '/consulta',
                            'defaults' => [
                                'controller' => \Landing\Controller\MainController::CLASS,
                                'action' => 'consulta',
                            ],
                        ],
                        'may_terminate' => true,

                    ],
                    'addinvitado' => [
                        'type' => 'Zend\Router\Http\Segment',
                        'options' => [
                            'route' => '/addinvitado/:id',
                            'constraints' => [
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => \Landing\Controller\MainController::CLASS,
                                'action' => 'add-invitado',
                            ],
                        ],
                        'may_terminate' => true,

                    ],
                    'delinvitado' => [
                        'type' => 'Zend\Router\Http\Segment',
                        'options' => [
                            'route' => '/delinvitado/:id',
                            'constraints' => [
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => \Landing\Controller\MainController::CLASS,
                                'action' => 'del-invitado',
                            ],
                        ],
                        'may_terminate' => true,

                    ],
                    'FacebookCallback' => [
                        'type' => 'Segment',
                        'mayTerminate' => true,
                        'options' => [
                            'route' => '/facebook-callback',
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
                    'GoogleCallback' => [
                        'type' => 'Segment',
                        'mayTerminate' => true,
                        'options' => [
                            'route' => '/google-callback',
                            'defaults' => [
                                'controller' => \Landing\Controller\MainController::CLASS,
                                'action' => 'googleCallback',
                            ],
                        ],
                    ],
                    'GoogleLogout' => [
                        'type' => 'Segment',
                        'mayTerminate' => true,
                        'options' => [
                            'route' => '/google-logout',
                            'defaults' => [
                                'controller' => \Landing\Controller\MainController::CLASS,
                                'action' => 'googleLogout',
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