<?php

return [
    'view_manager' => [
        'template_map' => [
            'www/layout' => __DIR__ . '/../view/www/layout/layout.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view'
        ],
    ],
];
