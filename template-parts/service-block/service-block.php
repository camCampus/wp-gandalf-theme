<?php

$query = new WP_Query([
    'post_type' => 'service-post',
    'posts_per_page'=> 2,
    'order' => 'DESC',
    'orderBy' => 'date'
]);
var_dump(get_page_template_slug( get_queried_object_id() ));
while ($query->have_posts()): $query->the_post(); ?>
    <?php get_template_part('template-parts/cta/2col-cta-link') ?>
<?php endwhile;
wp_reset_postdata(); ?>
