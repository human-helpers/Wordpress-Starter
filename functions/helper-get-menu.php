<?php
/**
 * Modification of "Build a tree from a flat array in PHP"
 *
 * Authors: @DSkinner, @ImmortalFirefly and @SteveEdson
 *
 * @link https://stackoverflow.com/a/28429487/2078474
 * @link https://wordpress.stackexchange.com/questions/170033/convert-output-of-nav-menu-items-into-a-tree-like-multidimensional-array
 */
function get_menu_tree(array &$elements, $parent_id = 0)
{
    $branch = [];
    foreach ($elements as &$element) {
        if ($element->menu_item_parent == $parent_id) {
            $children = get_menu_tree($elements, $element->ID);
            if ($children) {
                $element->children = $children;
            }
            $branch[$element->ID] = $element;
            unset($element);
        }
    }
    return $branch;
}

/**
 * Transform a navigational menu to it's tree structure
 *
 * @uses  get_menu_tree()
 * @uses  wp_get_nav_menu_items()
 *
 * @param  String     $location
 * @return Array|false $tree
 */
function get_menu($location)
{
    $theme_locations = get_nav_menu_locations();
    $menu_id = $theme_locations[$location] ?: false;
    $items = wp_get_nav_menu_items($menu_id);
    if (empty($items)) {
        return false;
    } else {
        $menu_json_string = get_menu_tree($items, 0);
        /**
         * @link https://stackoverflow.com/questions/10631767/converting-array-and-objects-in-array-to-pure-array
         * ⬇️ just converting the menu objects to arrays, because I like it more
         */
        $json = json_encode($menu_json_string);
        $menu = json_decode($json, true);
        return $menu;
    }
}
