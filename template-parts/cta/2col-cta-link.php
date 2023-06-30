
<div id="cta-img" class="default-block cta-link-js">
    <div id="cta-wrapper">
        <div id="cta-header">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons8-arrow-100.png" alt="">
            <h2><?php the_title() ?></h2></h2>
        </div>

        <div id="cta-content" style="
                background: url('<?php echo get_stylesheet_directory_uri() ?>/images/bg.jpg');"
        >
            <div class="cta-left">

                <p><?= get_field('service_post_text') ?></p>
                <a href="<?php the_permalink();?>">Go -></a>
            </div>
            <div class="cta-right">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
    </div>
</div>