<?php $query = new WP_Query([
    'post_type' => 'contact-block',
]);

while ($query->have_posts()): $query->the_post(); ?>
    <?php get_template_part('template-parts/contact/cta') ?>
<?php endwhile;
wp_reset_postdata(); ?>
