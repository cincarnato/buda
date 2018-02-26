<?php

$setting = array_merge_recursive(
include "controller.config.php",
//include "doctrine.config.php",
include "host-route.config.php",
include "route.config.php",
include "view.config.php"
);

return $setting;
