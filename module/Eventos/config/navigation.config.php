<?php

return [
    'navigation' => [
        'default' => [
            [
                'label' => 'Configuración',
                'detail' => '',
                'icon' => '',
                'permission' => 'general-admin',
                'route' => 'Eventos/Lugar/Grid',
                'uri' => '',
                'pages' => [
                    [
                        'label' => 'Lugar',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'Eventos/Lugar/Grid',
                    ],
                    [
                        'label' => 'Flyer',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'Eventos/Flyer/Grid',
                    ],
                    [
                        'label' => 'Fotos',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'Eventos/Fotos/Grid',
                    ],
                    [
                        'label' => 'Detalle de Evento',
                        'detail' => '',
                        'icon' => '',
                        'permission' => 'general-admin',
                        'route' => 'Eventos/DetalleEvento/Grid',
                    ],
                ],
            ],
            [
                'label' => 'Eventos',
                'detail' => '',
                'icon' => '',
                'permission' => 'general-admin',
                'route' => 'Eventos/Evento/Grid',
            ],
            [
                'label' => 'Contactos',
                'detail' => '',
                'icon' => '',
                'permission' => 'general-admin',
                'route' => 'Eventos/Contacto/Grid',
            ],
            [
                'label' => 'Invitados',
                'detail' => '',
                'icon' => '',
                'permission' => 'general-admin',
                'route' => 'Eventos/Invitado/Grid',
            ],
        ],
    ],
];