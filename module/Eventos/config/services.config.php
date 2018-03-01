<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Eventos.options' => \Eventos\Factory\Options\ModuleOptionsFactory::class,
            \Eventos\Service\FacebookUser::class => \Eventos\Factory\Service\FacebookUserFactory::class,
        ),
    ),
);