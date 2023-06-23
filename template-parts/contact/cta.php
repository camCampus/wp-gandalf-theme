
<div id="contact-cta-container" class="default-block">
    <div class="contact-cta-left contact-cta" >
        <h2><?php the_title() ?></h2>
        <p><?= get_field('contact_block_text') ?></p>
        <button><?= get_field('contact_block_button') ?></button>
    </div>

    <div class="contact-cta-right contact-cta">
        <?= do_shortcode(get_field('contact_block_map_shortcode')) ?>
    </div>

</div>