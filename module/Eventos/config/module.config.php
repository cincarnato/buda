<?php

$setting = array_merge_recursive(
include "doctrine.config.php",
include "view.config.php",
include "controller.config.php",
include "navigation.config.php",
include "route.config.php",
include "zfm-datagrid.lugar.config.php"
);

return $setting;
