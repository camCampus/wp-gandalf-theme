<?php ?>
<div id="post-card-container" class="card-post-class">
        <?php the_post_thumbnail('thumbnail'); ?>
        <h3 id="card-title"><?php the_title() ?></h3>
        <p><?php the_excerpt() ?></p>
        <span id="card-txt-link">Read more</span>
    <a id="post-card-link" href="<?php the_permalink(); ?>"></a>
</div>
