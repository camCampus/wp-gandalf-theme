<?php
/**
 * Template Name: news
 */
?>

<?php get_header() ?>

    <div class="content-wrap">

        <?php get_template_part('template-parts/intro/intro') ?>

        <div id="card-gallery-content">
            <div class="article-main-content">
                <?php $query = new WP_Query([
                    'post_type' => 'post',
                    'order' => 'date',
                    'orderBy' => 'DESC'
                ]);

                while ($query->have_posts()): $query->the_post(); ?>
                    <?php get_template_part('template-parts/post/post-card') ?>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>
        <?php get_template_part('template-parts/contact/contact-block') ?>
    </div>


<?php get_footer() ?>