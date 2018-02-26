<?php

return [
    'navigation' => [
        'default' => [
            [
                'label' => 'Gestion',
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
                ],
            ],
        ],
    ],
];