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
echo "
    <$is class='page-header $class'>
        <h$heading_level class='page-header__heading'>
            $heading
        </h$heading_level>
        $body
    </$is>
";
