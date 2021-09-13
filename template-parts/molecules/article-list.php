<ul class="">
    <?php if (have_posts()):
        while (have_posts()):
            the_post();
            get_template_part("template-parts/molecules/card", null, [
                "heading" => get_the_title(),
                "is" => "li",
                "url" => get_the_permalink(),
            ]);
        endwhile;
    endif; ?>
</ul>