<?php

return [
    'view_manager' => [
        'template_map' => [
            'landing/layout' => __DIR__ . '/../view/landing/layout/layout.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view'
        ],
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ],
];
