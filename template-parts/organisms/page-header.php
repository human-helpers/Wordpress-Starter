<?php

$args = $args ?: [];
$defaults = [
    "class" => null,
    "heading" => null,
    "heading_level" => 1,
    "is" => "header",
];
extract(array_merge($defaults, $args));

$body = $body ? "<div class='page-header__body'>$body</div>" : "";

echo "<$is class='page-header $class'>";

get_template_part("template-parts/atoms/heading", "", [
    "text" => $heading,
    "heading_level" => $heading_level,
    "class" => "page-header__heading",
]);

echo "$body 
</$is>";
