<?php

$includes = [
    "functions/helper-get-menu.php",
    "functions/settings-menus.php",
    "functions/settings-supported-features.php",
];
foreach ($includes as $include) {
    require_once $include;
}
