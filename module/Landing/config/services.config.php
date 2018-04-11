<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Landing.options' => \Landing\Factory\Options\ModuleOptionsFactory::class,
        ),
    ),
);