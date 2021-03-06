<?php

get_header();

get_template_part("template-parts/organisms/main-menu");

echo "<main>";
get_template_part("template-parts/organisms/page-header", get_post_type(), [
    "heading" => wp_title("", false),
]);
get_template_part("template-parts/molecules/article", get_post_type());
echo "</main>";
get_footer();
