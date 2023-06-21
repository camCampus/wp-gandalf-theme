<?php

function gandalf_setup(): void
{
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support(
        'post-formats',
        array(
            'link',
            'aside',
            'gallery',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat',
        )
    );
    add_theme_support('post-thumbnails');
    add_theme_support(
        'html5',
        array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets',
        )
    );

    register_nav_menus([
        'header'=> __('header-menu'),
        'footer' => __('footer_menu')
    ]);

}

add_action('after_setup_theme', 'gandalf_setup');

function wp_fonts_register_styles(): void
{
    //Google font
    wp_register_style('default-css', get_template_directory_uri() . '/assets/css/default.css');
    wp_register_style('single-post-css', get_template_directory_uri() . '/assets/css/single-post.css');
    wp_register_style('post-card-css', get_template_directory_uri() . '/assets/css/post-card.css');
    wp_register_style('open-sans-font', '//fonts.googleapis.com/css2?family=Fira+Code:wght@300;400&display=swap');
    wp_register_style('fira-code-font', '//fonts.googleapis.com/css2?family=Open+Sans:wght@600;800&display=swap');
    wp_register_style('article-page-css', get_template_directory_uri() . '/assets/css/article-page.css');
    wp_register_style('picture-gallery-css', get_template_directory_uri() . '/assets/css/picture-gallery.css');
    wp_register_style('contact-cta-css', get_template_directory_uri() . '/assets/css/contact-cta.css');
    wp_register_style('intro-css', get_template_directory_uri() . '/assets/css/intro.css');
    wp_register_style('navbar-css', get_template_directory_uri() . '/assets/css/navbar.css');
    wp_register_style('cta-css', get_template_directory_uri() . '/assets/css/cta.css');
    wp_enqueue_style('fira-code-font');
    wp_enqueue_style('open-sans-font');
    wp_enqueue_style('default-css');
    wp_enqueue_style('post-card-css');
    wp_enqueue_style('article-page-css');
    wp_enqueue_style('picture-gallery-css');
    wp_enqueue_style('single-post-css');
    wp_enqueue_style('contact-cta-css');
    wp_enqueue_style('navbar-css');
    wp_enqueue_style('intro-css');
    wp_enqueue_style('cta-css');
}

add_action('wp_enqueue_scripts', 'wp_fonts_register_styles');

function gandalf_title(): string
{
    return '|';
}

add_filter('document_title_separator', 'gandalf_title');

function my_custom_post_type(): void
{
    register_post_type('custom_post_type', [
        "labels" => ['name' => __('custom')],
    ]);
}


function load_my_script(): void
{
    global $post;
    $deps = array('jquery');
    $version = '1.0';
    wp_register_script('post-card-js', get_template_directory_uri().'/assets/js/post-card.js', $deps, $version, true);
    wp_enqueue_script('post-card-js');
    wp_localize_script('post-card-js', 'my_script_vars', array(
            'link' => get_permalink(),
            'id' => $post->ID
        )
    );
}

add_action('wp_enqueue_scripts', 'load_my_script');