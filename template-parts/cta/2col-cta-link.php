

<div id="cta-link" class="default-block">

    <div class="cta-left">

        <h2><?php the_title() ?></h2>

        <p><?= get_field('service_post_text') ?></p>

        <a href="<?php the_permalink();?>">Go -></a>

    </div>

    <div class="cta-right">
       <?php the_post_thumbnail(); ?>
    </div>

</div>
