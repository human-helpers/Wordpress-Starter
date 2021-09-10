<?php
/**
 * In this array, the keys are the features
 * and values are the args for the feature
 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
 * @var (false|mixed)[]
 */
$supported_features = [
    "custom-logo" => false,
    "title-tag" => false,
];
foreach ($supported_features as $feature => $args) {
    if (empty($args)) {
        add_theme_support($feature);
    } else {
        add_theme_support($feature, $args);
    }
}
