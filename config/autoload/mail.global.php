<?php

namespace ZfMetal\Security;

return[
    'zf-metal-mail.options' => [
        'default-from' => 'ci.sys.virtual@gmail.com',
        'transport' => 'Zend\Mail\Transport\Smtp',
        'transport_options' => [
            'name' => 'gmail',
            'host' => 'smtp.gmail.com',
            'port' => 465,
            // Notice port change for TLS is 587
            'connection_class' => 'plain',
            'connection_config' => [
                'username' => 'ci.sys.virtual@gmail.com',
                'password' => 'asd',
                'ssl' => 'ssl',
            ],
        ]
    ],
];
