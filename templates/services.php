<?php
/**
 * Template Name: services
 */
?>

<?php get_header() ?>

<div class="content-wrap">
    <div class="cta-link-js">

        <?php $query = new WP_Query([
            'post_type' => 'service-post',
            'order' => 'DESC',
            'orderBy' => 'date'
        ]);

        while ($query->have_posts()): $query->the_post(); ?>
            <?php get_template_part('template-parts/cta/2col-cta-link') ?>
        <?php endwhile; wp_reset_postdata(); ?>

    </div>
</div>


<?php get_footer() ?>


