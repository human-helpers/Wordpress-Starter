<?php

$args = $args ?: [];
$defaults = [
    "class" => null,
    "heading" => null,
    "heading_level" => 2,
    "is" => "div",
    "url" => null,
];
extract(array_merge($defaults, $args));

echo "
        <$is class='card $class'>
            <h$heading_level class='card__heading'>
                <a href='$url' class='card__link'>
                    $heading
                </a>
            </h$heading_level>
        </$is>
    ";
