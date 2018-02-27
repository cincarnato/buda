<?php

return [
    'router' => [
        'routes' => [
            'WWW' => [
                'type' => 'Literal',
                'mayTerminate' => false,
                'options' => [
                    'route' => '/www',
                    'defaults' => [
                        'controller' => \WWW\Controller\MainController::CLASS,
                        'action' => 'home',
                    ],
                ],
                'child_routes' => [
                    'Main' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/main',
                            'defaults' => [
                                'controller' => \WWW\Controller\MainController::CLASS,
                                'action' => 'home',
                            ],
                        ],
                        'child_routes' => [
                            'Home' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/home',
                                    'defaults' => [
                                        'controller' => \WWW\Controller\MainController::CLASS,
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