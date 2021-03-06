<?php

return [
    'zf-metal-datagrid.custom' => [
        'eventos-entity-contacto' => [
            'gridId' => 'zfmdg_Contacto',
            'title' => "Contactos",
            'title_add' => "Creando Contacto",
            'title_edit' => "Editando Contacto",
            'sourceConfig' => [
                'type' => 'doctrine',
                'doctrineOptions' => [
                    'entityName' => \Eventos\Entity\Contacto::class,
                    'entityManager' => 'doctrine.entitymanager.orm_default',
                ],
            ],
            'formConfig' => [
                'columns' => \ZfMetal\Commons\Consts::COLUMNS_ONE,
                'style' => \ZfMetal\Commons\Consts::STYLE_VERTICAL,
                'groups' => [
                    
                ],
            ],
            'multi_filter_config' => [
                "enable" => true,
                "properties_disabled" => []
            ],
            "multi_search_config" => [
                "enable" => true,
                "properties_enabled" => ['nombre', 'apellido','cumpleTexto', 'nacimiento','edad']
            ],
            'columnsConfig' => [
                'id' => [
                    'displayName' => 'ID',
                ],
                'nacimiento' => [
                    'type' => 'date',
                    'format' => 'Y-m-d',
                ],
                'cumpleTexto' => [
                    'hidden' => true
                ],
                'cumple' => [
                    'hidden' => true
                ],
                'nombre' => [
                    'hidden' => true
                ],
                'apellido' => [
                    'hidden' => true
                ],
                'facebookUrl' => [
                    'hidden' => true
                ],
                'facebookId' => [
                    'hidden' => true
                ],
                'googleUrl' => [
                    'hidden' => true
                ],
                'googleId' => [
                    'hidden' => true
                ],
                'source' => [
                    'hidden' => true
                ],
                'googlePicture' => [
                    'hidden' => true
                ],
            ],
            'crudConfig' => [
                'enable' => true,
                'add' => [
                    'enable' => true,
                    'class' => 'material-icons text-primary cursor-pointer',
                    'value' => 'add',
                ],
                'edit' => [
                    'enable' => true,
                    'class' => 'material-icons text-primary cursor-pointer',
                    'value' => 'mode_edit'
                ],
                'del' => [
                    'enable' => true,
                    'class' => 'material-icons text-danger cursor-pointer',
                    'value' => 'delete_sweep'
                ],
                'view' => [
                    'enable' => true,
                    'class' => 'material-icons text-success cursor-pointer',
                    'value' => 'view_list',
                ],
                'manager' => [
                    'enable' => false,
                    'class' => 'material-icons',
                    'value' => 'create',
                ],
                ]
        ],
    ],
];