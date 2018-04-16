<?php
namespace Application;

use Zend\Router\Http\Literal;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => 'Literal',
                'mayTerminate' => true,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => \Eventos\Controller\MainController::class,
                        'action' => 'home',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            \Application\Controller\IndexController::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
        ],
    ],
    'translator' => array(
        'locale' => 'es_ES',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
            array(
                'type' => \Zend\I18n\Translator\Loader\PhpArray::class,
                'base_dir' => \Zend\I18n\Translator\Resources::getBasePath(),
                'pattern' => \Zend\I18n\Translator\Resources::getPatternForValidator(),
            ),
        ),
    ),
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
        'factories' => [
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ]
    ]
];

