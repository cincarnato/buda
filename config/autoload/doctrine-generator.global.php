<?php

return [
    'doctrine' => array(
        'connection' => array(
            'orm_zf_metal_generator' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOSqlite\Driver',
                'params' => array(
                    'path' => __DIR__ . '/../../data/zf-metal-generator/generator.db',
                )
            )
        ),
    ),
];
