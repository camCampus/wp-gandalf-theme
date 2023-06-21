<?php get_header() ?>


<?php
$args = [
    'posts_per_page' => 5,
];
$query = new WP_Query($args);
?>
<div id="home-post-card-list">
    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <?php get_template_part('template-parts/post/post-card') ?>


    <?php endwhile; ?>

    <?php else: ?>

        <p>Aucun article trouvé !</p>

    <?php endif; ?>
    <?php wp_reset_postdata() ?>
</div>


<?php get_footer(); ?>