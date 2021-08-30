<?php
$props = array_merge(
    [
        "lang" => "en",
        "body_class" => "",
    ],
    $args
); ?>
<!DOCTYPE html>
<html lang="<?php echo $props["lang"]; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body class='<?php body_class($props["body_class"]); ?>'>
    <?php get_template_part("template-parts/header/header-nav"); ?>
