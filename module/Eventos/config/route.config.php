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
                    'DetalleEvento' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/detalle-evento',
                            'defaults' => [
                                'controller' => \Eventos\Controller\DetalleEventoController::CLASS,
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
                                        'controller' => \Eventos\Controller\DetalleEventoController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Evento' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/evento',
                            'defaults' => [
                                'controller' => \Eventos\Controller\EventoController::CLASS,
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
                                        'controller' => \Eventos\Controller\EventoController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Contacto' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/contacto',
                            'defaults' => [
                                'controller' => \Eventos\Controller\ContactoController::CLASS,
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
                                        'controller' => \Eventos\Controller\ContactoController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                            'Confirmados' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/confirmados/:idEvento',
                                    'defaults' => [
                                        'controller' => \Eventos\Controller\ContactoController::CLASS,
                                        'action' => 'confirmados',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Invitado' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/invitado',
                            'defaults' => [
                                'controller' => \Eventos\Controller\InvitadoController::CLASS,
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
                                        'controller' => \Eventos\Controller\InvitadoController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                            'Evento' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/evento/:idEvento',
                                    'defaults' => [
                                        'controller' => \Eventos\Controller\InvitadoController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Main' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/main',
                            'defaults' => [
                                'controller' => \Eventos\Controller\MainController::CLASS,
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
                                        'controller' => \Eventos\Controller\MainController::CLASS,
                                        'action' => 'home',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Consulta' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/consulta',
                            'defaults' => [
                                'controller' => \Eventos\Controller\ConsultaController::CLASS,
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
                                        'controller' => \Eventos\Controller\ConsultaController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'CorreoDestinoConsulta' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/correo-destino-consulta',
                            'defaults' => [
                                'controller' => \Eventos\Controller\CorreoDestinoConsultaController::CLASS,
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
                                        'controller' => \Eventos\Controller\CorreoDestinoConsultaController::CLASS,
                                        'action' => 'grid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'Ayuda' => [
                        'type' => 'Literal',
                        'mayTerminate' => false,
                        'options' => [
                            'route' => '/ayuda',
                            'defaults' => [
                                'controller' => \Eventos\Controller\AyudaController::CLASS,
                                'action' => 'main',
                            ],
                        ],
                        'child_routes' => [
                            'Main' => [
                                'type' => 'Segment',
                                'mayTerminate' => true,
                                'options' => [
                                    'route' => '/main',
                                    'defaults' => [
                                        'controller' => \Eventos\Controller\AyudaController::CLASS,
                                        'action' => 'main',
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