<?php

return array(
    'controller_plugins' => array(
        'factories' => array(
            \Landing\Controller\Plugin\Options::class => \Landing\Factory\Controller\Plugin\OptionsFactory::class,
        ),
        'aliases' => array(
            'landingOptions' => \Landing\Controller\Plugin\Options::class,
        ),
    ),
);