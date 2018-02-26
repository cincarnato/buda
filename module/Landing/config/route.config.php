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
                        ],
                    ],
                ],
            ],
        ],
    ],
];