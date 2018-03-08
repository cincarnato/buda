<?php

return [
    'zf-metal-datagrid.custom' => [
        'eventos-entity-evento' => [
            'gridId' => 'zfmdg_Evento',
            'title' => "Eventos",
            'title_add' => "Creando Evento",
            'title_edit' => "Editando Evento",
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
                    [
                        'type' => \ZfMetal\Commons\Options\FormGroupConfig::TYPE_HORIZONTAL,
                        'id' => 'Grupo',
                        'title' => "",
                        'columns' => \ZfMetal\Commons\Consts::COLUMNS_TWO,
                        'style' => \ZfMetal\Commons\Consts::STYLE_VERTICAL,
                        'fields' => ['nombre','clave','lugar','flyer']
                    ],
                    [
                        'type' => \ZfMetal\Commons\Options\FormGroupConfig::TYPE_HORIZONTAL,
                        'id' => 'Grupo',
                        'title' => "",
                        'columns' => \ZfMetal\Commons\Consts::COLUMNS_TWO,
                        'style' => \ZfMetal\Commons\Consts::STYLE_VERTICAL,
                        'fields' => ['fecha','detalleEvento','hora','minutos']
                    ],
                    
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
                    'hidden' => true,
                ],
                'detalleEvento' => [
                    'hidden' => true,
                ],
                'confirmados' => [
                    'hidden' => true,
                ],
                'invitados' => [
                    'hidden' => true,
                ],
            ],
            'crudConfig' => [
                'enable' => true,
                'side' => "left",
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