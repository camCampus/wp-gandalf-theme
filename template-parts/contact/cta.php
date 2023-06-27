
<div id="contact-cta-container" class="default-block">
    <div class="contact-cta-left contact-cta" >
        <h2><?php the_title() ?></h2>
        <p><?= get_field('contact_block_text') ?></p>
        <button id="contact-cta-btn"><?= get_field('contact_block_button') ?></button>
        <div>
            <p><?= get_field('contact_block_adress') ?></p>
            <p><?= get_field('contact_block_street_number') ?></p>
            <p><?= get_field('contact_block__street_type') ?></p>
            <p><?= get_field('contact_block_zip_code') ?></p>
            <p><?= get_field('contact_block_city') ?></p>
            <p><?= get_field('contact_block_country') ?></p>
            <p><?= get_field('contact_block__phone_number') ?></p>
            <a href="mailto:a@a.com"><p><?= get_field('contact_block_email') ?></p></a>
        </div>
    </div>

    <div class="contact-cta-right contact-cta">
        <?= do_shortcode(get_field('contact_block_map_shortcode')) ?>
    </div>

</div>