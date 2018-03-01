<?php

return array(
    'controller_plugins' => array(
        'factories' => array(
            \Eventos\Controller\Plugin\Options::class => \Eventos\Factory\Controller\Plugin\OptionsFactory::class,
        ),
        'aliases' => array(
            'eventosOptions' => \Eventos\Controller\Plugin\Options::class,
        ),
    ),
);