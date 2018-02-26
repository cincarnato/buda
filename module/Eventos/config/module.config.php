<?php

$setting = array_merge_recursive(
include "controller.config.php",
include "doctrine.config.php",
include "navigation.config.php",
include "route.config.php",
include "view.config.php",
include "zfm-datagrid.flyer.config.php",
include "zfm-datagrid.fotos.config.php",
include "zfm-datagrid.lugar.config.php"
);

return $setting;
