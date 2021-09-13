<?php

get_header();

get_template_part("template-parts/organisms/main-menu");

get_template_part("template-parts/organisms/page-header", "archive", [
    "heading" => wp_title("", false) ?: get_option("blogname"),
]);
echo "<main>";
get_template_part("template-parts/molecules/article-list", "archive");
echo "</main>";
get_footer();
