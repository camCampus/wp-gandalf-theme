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
    add_theme_support( 'post-thumbnails' );
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

    register_nav_menu('primary', __('primary-menu'));

}
add_action('after_setup_theme', 'gandalf_setup');

function wp_fonts_register_styles(): void
{
    //Google font
    wp_register_style('default-css', get_template_directory_uri().'/assets/css/default.css');
    wp_register_style('single-post-css', get_template_directory_uri().'/assets/css/single-post.css');
    wp_register_style('post-card-css', get_template_directory_uri().'/assets/css/post-card.css');
    wp_register_style('open-sans-font', '//fonts.googleapis.com/css2?family=Fira+Code:wght@300;400&display=swap');
    wp_register_style('fira-code-font', '//fonts.googleapis.com/css2?family=Open+Sans:wght@600;800&display=swap');
    wp_register_script('post-card-js', get_template_directory_uri().'/assets/js/post-card.js');
    wp_enqueue_style('fira-code-font');
    wp_enqueue_style('open-sans-font');
    wp_enqueue_style('default-css');
    wp_enqueue_style('post-card-css');
    if (is_single()){
        wp_enqueue_style('single-post-css');
    }
    wp_enqueue_script('post-card-js');
}
add_action('wp_enqueue_scripts', 'wp_fonts_register_styles');

function gandalf_title()
{
    return '|';
}
add_filter('document_title_separator', 'gandalf_title');

function my_custom_post_type()
{
    register_post_type('custom_post_type', [
        "labels" => ['name' => __('custom')],
    ]);
}