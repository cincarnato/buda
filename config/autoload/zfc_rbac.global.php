<?php

return [
    'zfc_rbac' => [
        'guards' => [
            'ZfcRbac\Guard\RouteGuard' => [
                'Application*' => ['user', 'admin'],
                'Eventos*' => ['user', 'admin'],
                'Landing*' => ['guest','user', 'admin'],
                'HostLanding*' => ['guest','user', 'admin'],
                'wow*' => ['guest','user', 'admin'],
            ]
        ],
    ]
];
