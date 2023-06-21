<?php ?>
<div id="post-card-container">
        <?php the_post_thumbnail('thumbnail'); ?>
        <h3 id="card-title"><?php the_title() ?></h3>
        <p><?php the_excerpt() ?></p>
        <span id="card-txt-link">Read more</span>
    <a href="<?php the_permalink(); ?>"></a>
</div>
