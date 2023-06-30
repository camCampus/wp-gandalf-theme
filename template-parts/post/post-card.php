
<div id="post-card-container" class="card-post-class">
        <div id="card-thumb">
            <?php the_post_thumbnail('medium'); ?>
        </div>
        <h3 id="card-title"><?php the_title() ?></h3>
        <div id="card-excerpt">
            <p id="p-card"><?php the_excerpt() ?></p>
        </div>
        <span id="card-txt-link">Read more</span>
    <a id="post-card-link" href="<?php the_permalink(); ?>"></a>
</div>
