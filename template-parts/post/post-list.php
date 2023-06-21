<?php get_header() ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h3><?php the_title(); ?></h3>
    <?php the_content(); ?>
    <a href="<?php the_permalink(); ?>"></a>

<?php endwhile; ?>

<?php else: ?>

    <p>Aucun article trouvé !</p>

<?php endif; ?>
<?php get_footer() ?>