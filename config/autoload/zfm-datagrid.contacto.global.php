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