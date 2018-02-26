<?php

//move to root "config/autoload/"
return array(
    'zf-metal-datagrid.options' => array(
        'grid_id' => 'gg',
        'title' => '',
        'title_add' => '',
        'title_edit' => '',
        'records_per_page' => 10,
        'template_default' => 'default',
        'export_config' => [
            'export_to_excel' => [
                'enable' => false,
                'key' => '',
                'btn_class' => 'btn btn-default',
                'btn_value' => 'excel',
                'btn_tag' => 'button',
            ],
            'export_to_csv' => [
                'enable' => false,
                'key' => '',
                'btn_class' => 'btn btn-default',
                'btn_value' => 'excel',
                'btn_tag' => 'button',
            ],
        ],
        'multi_filter_config' => [
            "enable" => true,
            "properties_disabled" => []
        ],
        "multi_search_config" => [
            "enable" => false,
            "properties_enabled" => []
        ],
        "formConfig" => [
            'columns' => \ZfMetal\Commons\Consts::COLUMNS_ONE,
            'style' => \ZfMetal\Commons\Consts::STYLE_MENU_VERTICAL,
            'submit' => [
                'enable' => true,
                'value' => 'Submit',
                'class' => 'btn btn-primary'
            ],
            'cancel' => [
                'enable' => true,
                'value' => 'Cancel',
                'class' => 'btn btn-default'
            ],
            'clean' => [
                'enable' => false,
                'value' => 'Clean',
                'class' => 'btn btn-warning'
            ],
        ],
        "crudConfig" => [
            "enable" => true,
            "side" => "left",
//            'add' => [
//                'enable' => true,
//                'class' => 'material-icons text-primary cursor-pointer',
//                'value' => 'add',
//            ],
//            'edit' => [
//                'enable' => true,
//                'class' => 'material-icons text-primary cursor-pointer',
//                'value' => 'mode_edit'
//            ],
//            'del' => [
//                'enable' => true,
//                'class' => 'material-icons text-danger cursor-pointer',
//                'value' => 'delete_sweep'
//            ],
//            'view' => [
//                'enable' => true,
//                'class' => 'material-icons text-success cursor-pointer',
//                'value' => 'view_list',
//            ],
//            'manager' => [
//                'enable' => false,
//                'class' => 'material-icons',
//                'value' => 'create',
//            ],
        ],
    )
);
