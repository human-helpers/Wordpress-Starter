<main>
    <article class="<?php post_class(); ?>">
        <?php if (have_posts()):
            while (have_posts()):
                the_post();
                the_title("<h1>", "</h1>");
                the_content();
            endwhile;
        endif; ?>
    </article>
</main>