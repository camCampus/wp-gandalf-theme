<?php get_header() ?>

<div class="content-wrap">
    <?php get_template_part('template-parts/cta/2col-cta-img') ?>
    <?php get_template_part('template-parts/cta/3card-cta')?>
    <?php get_template_part('template-parts/service-block/service-block')?>
    <?php get_template_part('template-parts/testimonies/testimonies') ?>
    <?php get_template_part('template-parts/contact/contact-block') ?>
</div>
<?= get_query_var('front-home') ?>
<?php get_footer(); ?>