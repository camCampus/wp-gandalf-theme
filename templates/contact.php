<?php /**
 * Template Name: contact
 */
?>

<?php get_header() ?>

    <div class="content-wrap">
    <div class="contact-form-wp">
        <?= do_shortcode("[contact-form-7 id='217' title='Contact form 1']") ?>

    </div>
        <?php get_template_part('template-parts/contact/contact-block') ?>
<?php get_footer() ?>