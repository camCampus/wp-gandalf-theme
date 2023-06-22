<?php ?>
<div id="card-cta-container">
    <div id="card-title-wrapper">
        <h2><?= get_field('post_card_block_tittle') ?></h2>
        <p><?= get_field('post_card_block_text') ?></p>
    </div>
    <div id="card-card-container">
        <?php
        $args = [
            'order_by' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 3,
        ];
        $query = new WP_Query($args);
        ?>

        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part('template-parts/post/post-card') ?>


        <?php endwhile; ?>

        <?php else: ?>

            <p>Aucun article trouvé !</p>

        <?php endif; ?>
        <?php wp_reset_postdata() ?>

    </div>
</div>
