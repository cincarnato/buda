<?php

$setting = array_merge_recursive(
include "controller.config.php",
include "host-route.config.php",
include "options.config.php",
include "plugins.config.php",
include "route.config.php",
include "services.config.php",
include "view-helper.config.php",
include "view.config.php"
);

return $setting;
