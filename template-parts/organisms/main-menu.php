<?php
/**
 * @uses get_menu()
 */
$args = $args ?: [];
$logo_id = get_option("custom_logo");
$logo_text = empty($logo_id)
    ? get_option("blogname")
    : __(get_option("blogname") . " home");
$defaults = [
    "class" => null,
    "heading_level" => 2,
    "is" => "nav",
    "logo_id" => $logo_id,
    "logo_link" => get_site_url(),
    "logo_text" => $logo_text,
    "menu_location" => "main_menu",
    "skip_link_text" => __("Skip to content", "wordpressstarter"),
    "skip_link_url" => "#h1",
];
extract(array_merge($defaults, $args));

// Logo stuff
if (empty($logo_id)) {
    $logo = "<b class='logo__text'>$logo_text</b>";
} else {
    $logo = wp_get_attachment_image($logo_id, "full", false, [
        "alt" => $logo_text,
        "class" => "logo__image",
        "loading" => "eager",
    ]);
    $logo = str_replace("<img ", '<img role="img" decoding="async" ', $logo);
}

// markup
echo "<$is class='main-menu__wrapper $class''>
        <a href='$skip_link_url' class='skip-link'>
            $skip_link_text
        </a>
        <div>
            <a class='logo__link' href='$logo_link'>
                $logo
            </a>
        </div>
        <ul class='main-menu'>
    ";
$menu = get_menu($menu_location);
menu_list($menu);
echo "</ul>
    </$is>";

/**
 * @param array $menu array created by get_menu()
 * @param int $depth (optional) the  depth to start at, for the most part don't use this
 * @return void echoes out a menu that uses details/summary for sub menu dropdowns
 */
function menu_list($menu, $depth = 0)
{
    foreach ($menu as $link) {
        $classes = implode(" ", $link["classes"]);
        if (empty($link["children"])) {
            echo "<li class='
                        main-menu__li 
                        main-menu__li--$depth
                    '>
                        <a 
                            class='
                                main-menu__link 
                                main-menu__link--$depth
                                $classes
                            ' 
                            href='{$link["url"]}'
                        >
                            {$link["title"]}
                        </a>
                    </li>
                ";
        } else {
            echo "<li class='
                        main-menu__li 
                        main-menu__li--$depth
                        $classes
                    '>
                        <details>
                            <summary class='
                                main-menu__dropdown
                                main-menu__dropdown--$depth
                            '>
                                {$link["title"]}
                            </summary>
                            <ul>";
            menu_list($link["children"], $depth + 1);
            echo "      </ul>
                        </details>
                    </li>";
        }
    }
}
