
<?php

return [
    'zf-metal-datagrid.custom' => [
        'eventos-entity-consulta' => [
            'gridId' => 'zfmdg_Consulta',
            'sourceConfig' => [
                'type' => 'doctrine',
                'doctrineOptions' => [
                    'entityName' => \Eventos\Entity\Consulta::class,
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
                        'fields' => ['nombre','email']
                    ],
                    [
                        'type' => \ZfMetal\Commons\Options\FormGroupConfig::TYPE_HORIZONTAL,
                        'id' => 'Grupo',
                        'title' => "",
                        'columns' => \ZfMetal\Commons\Consts::COLUMNS_ONE,
                        'style' => \ZfMetal\Commons\Consts::STYLE_VERTICAL,
                        'fields' => ['mensaje']
                    ],
                    
                ],
            ],
            'columnsConfig' => [
                'id' => [
                    'displayName' => 'ID',
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