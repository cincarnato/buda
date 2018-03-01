<?php

$setting = array_merge_recursive(
include "controller.config.php",
include "doctrine.config.php",
include "host-route.config.php",
include "navigation.config.php",
include "plugins.config.php",
include "route.config.php",
include "services.config.php",
include "view-helper.config.php",
include "view.config.php",
include "zfm-datagrid.contacto.config.php",
include "zfm-datagrid.detalle-evento.config.php",
include "zfm-datagrid.evento.config.php",
include "zfm-datagrid.flyer.config.php",
include "zfm-datagrid.fotos.config.php",
include "zfm-datagrid.invitado.config.php",
include "zfm-datagrid.lugar.config.php"
);

return $setting;
