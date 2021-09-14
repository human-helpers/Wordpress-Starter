<?php

add_action("after_setup_theme", function () {
    $menus = [
        "footer" => "Footer",
        "main_menu" => "Main Menu",
    ];
    foreach ($menus as $location => $description) {
        register_nav_menu($location, __($description, "wordpressstarter"));
    }
});
