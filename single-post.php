<?php get_header() ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


    <?php get_template_part('template-parts/post/post-view'); ?>


<?php endwhile; ?>

<?php else: ?>

    <p>Aucun article trouvé !</p>

<?php endif; ?>


<?php get_footer() ?>
