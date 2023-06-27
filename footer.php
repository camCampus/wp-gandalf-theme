<footer id="footer-content">
    <?php
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'menu_class' => 'footer-menu',
    ]); ?>
    <div class="footer-icon">
        <a href="<?= get_field('footer_link_linkedin', get_option('page_on_front')) ?>" target="_blank">
            <?= get_field('footer_icon_linkedin',get_option('page_on_front')) ?>
        </a>
        <a href="<?= get_field('footer_link_twitter', get_option('page_on_front')) ?>" target="_blank">
            <?= get_field('footer_icon_twitter', get_option('page_on_front')) ?>
        </a>
        <a href="<?= get_field('footer_link_instagram', get_option('page_on_front')) ?>" target="_blank">
            <?= get_field('footer_icon_instagram', get_option('page_on_front')) ?>
        </a>
        <a href="<?= get_field('footer_link_facebook', get_option('page_on_front')) ?>" target="_blank">
            <?= get_field('footer_icon_facebook', get_option('page_on_front')) ?>
        </a>
    </div>
</footer>
</body>
</html>

<?php wp_footer(); ?>