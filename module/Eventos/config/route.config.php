<?php

return [
    'router' => [
        'routes' => [
            'Eventos' => [
                'type' => 'Literal',
                'mayTerminate' => false,
                'options' => [
                    'route' => '/eventos',
                    'defaults' => [
                        'controller' => \Eventos\Controller\LugarController::CLASS,
                        'action' => 'grid',
                    ],
                ],
                'child_routes' => [
                    'Lugar' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/lugar',
                            'defaults' => [
                                'controller' => \Eventos\Controller\LugarController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \Eventos\Controller\LugarController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Flyer' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/flyer',
                            'defaults' => [
                                'controller' => \Eventos\Controller\FlyerController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \Eventos\Controller\FlyerController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Fotos' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/fotos',
                            'defaults' => [
                                'controller' => \Eventos\Controller\FotosController::CLASS,
                                'action' => 'grid',
                            ],
                        ],
                        'child_routes' => [
                            'Grid' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/grid',
                                    'defaults' => [
                                        'controller' => \Eventos\Controller\FotosController::CLASS,
                                        'action' => 'grid',
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