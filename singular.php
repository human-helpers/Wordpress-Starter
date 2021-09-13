<?php

get_header();

get_template_part("template-parts/organisms/main-menu");

get_template_part("template-parts/organisms/page-header", get_post_type(), [
    "heading" => wp_title("", false),
]);
get_footer();
