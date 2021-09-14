<?php
$args = $args ?: [];
$defaults = [
    "class" => null,
    "heading_level" => 2,
    "id" => null,
    "is" => "header",
    "text" => null,
];
extract(array_merge($defaults, $args));
if ($heading_level === 1) {
    $id = "h1";
} elseif (empty($id) && !empty($text)) {
    $id = sanitize_title($text);
}
echo "
    <h$heading_level 
        class='$class'
        id='$id'
    >
        $text
    </h$heading_level>
";
