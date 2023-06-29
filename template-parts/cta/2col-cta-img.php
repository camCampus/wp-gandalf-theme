
<div id="cta-img" class="default-block">
    <div id="cta-wrapper">
        <div id="cta-header">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons8-arrow-100.png" alt="">
            <h2><?= get_field('cta_button_intro_title') ?></h2>
        </div>

        <div id="cta-content" style="
                background: url('<?php echo get_stylesheet_directory_uri() ?>/images/bg.jpg');"
        >
            <div class="cta-left">
                <p><?= get_field('cta_button_intro_text') ?></p>
                <button><?= get_field('cta_button_intro_button') ?></button>
            </div>
            <div class="cta-right">
                <img src="<?= get_field('cta_button_intro_image') ?>">
            </div>
        </div>
    </div>
</div>
