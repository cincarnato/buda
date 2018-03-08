<?php

return [
    'zf-metal-datagrid.custom' => [
        'eventos-entity-evento' => [
            'gridId' => 'zfmdg_Evento',
            'sourceConfig' => [
                'type' => 'doctrine',
                'doctrineOptions' => [
                    'entityName' => \Eventos\Entity\Evento::class,
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
                'contacto' => [
                    'type' => 'relational',
                ],
                'lugar' => [
                    'type' => 'relational',
                ],
                'fecha' => [
                    'type' => 'date',
                    'format' => 'Y-m-d',
                ],
                'flyer' => [
                    'type' => 'relational',
                    'hidden' => true,
                ],
                'detalleEvento' => [
                    'hidden' => true,
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
            ],
        ],
    ],
];