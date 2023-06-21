<?php
/**
 * Template Name: news
 */
?>

<?php get_header() ?>
<?php get_template_part('template-parts/intro/intro') ?>

<?php get_template_part('template-parts/gallery/pictures') ?>


    <div class="article-main-content">
<?php $query = new WP_Query([
    'post_type' => 'post',
    'order' => 'date',
    'orderBy' => 'DESC'
]);

while ($query->have_posts()): $query->the_post(); ?>
    <?php get_template_part('template-parts/post/post-view') ?>
    </div>
<?php endwhile;
wp_reset_postdata(); ?>

<?php get_template_part('template-parts/contact/cta') ?>

<?php get_footer() ?>