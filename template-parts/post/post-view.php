<div id="single-post-container">

    <?php if (get_field('post_image') != null): ?>
        <h3 class="single-post-title"><?php the_title() ?></h3>
    <?php else: ?>
        <h3 class="single-post-title">No title</h3>
    <?php endif; ?>

    <?= get_field('post_text'); ?>
    <?php if (get_field('post_image') != null): ?>
        <img src="<?= get_field('post_image') ?>">
    <?php endif; ?>

</div>


