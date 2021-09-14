<?php
$defaults = [
    "body_class" => null,
    "lang" => "en",
    "nav" => true,
];
$args = $args ?: [];
extract(array_merge($defaults, $args));

// get wp_head contents
ob_start();
wp_head();
$head = ob_get_contents();
ob_end_clean();

echo "<!DOCTYPE html>
    <html lang='$lang'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        $head
    </head>
    <body class='$body_class'>
";
