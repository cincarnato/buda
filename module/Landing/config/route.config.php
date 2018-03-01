<?php

return [
    'router' => [
        'routes' => [
            'Landing' => [
                'type' => 'Literal',
                'mayTerminate' => false,
                'options' => [
                    'route' => '/landing',
                    'defaults' => [
                        'controller' => \Landing\Controller\MainController::CLASS,
                        'action' => 'start',
                    ],
                ],
                'child_routes' => [
                    'Main' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
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