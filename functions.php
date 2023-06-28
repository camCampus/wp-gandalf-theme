<?php

function gandalf_setup(): void
{
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support('widgets');
    add_theme_support('automatic-feed-links');
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
        'header' => __('header-menu'),
        'footer' => __('footer-menu')
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
    wp_register_style('footer-menu-css', get_template_directory_uri() . '/assets/css/footer-menu.css');
    wp_register_style('testimony-css', get_template_directory_uri() . '/assets/css/testimonies.css');
    wp_register_style('Font-Awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css");
    wp_register_style('service-logo-block-css', get_template_directory_uri() . '/assets/css/service-logo-block.css');
    wp_enqueue_style('Font-Awesome');
    wp_enqueue_style('testimony-css');
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
    wp_enqueue_style('footer-menu-css');
    wp_enqueue_style('service-logo-block-css');
}

add_action('wp_enqueue_scripts', 'wp_fonts_register_styles');

function gandalf_title(): string
{
    return '|';
}

add_filter('document_title_separator', 'gandalf_title');

function custom_post_type(): void
{

    register_post_type('contact-block', [
        "labels" => ['name' => __('contact-block')],
        'capability_type' => 'post',
        'capabilities' => [
            'create_posts' => 'false',
            'delete_published_posts' => false,
        ],
        'map_meta_cap' => true,
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
        'create_posts' => false,
    ]);
    register_post_type('service-post', [
        "labels" => ['name' => __('service-post')],
        'capability_type' => 'post',
        'capabilities' => [
            'create_posts' => true,
            'delete_published_posts' => true,
        ],
        'map_meta_cap' => true,
        'has_archive' => true,
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail', 'excerpt'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
        'create_posts' => false,
    ]);
}

add_action('init', 'custom_post_type');

function load_my_script(): void
{
    global $post;
    $deps = array('jquery');
    $version = '1.0';
    wp_register_script('post-card-js', get_template_directory_uri() . '/assets/js/post-card.js', $deps, $version, true);
    wp_enqueue_script('post-card-js');
    wp_localize_script('post-card-js', 'my_script_vars', array(
            'link' => get_permalink(),
            'id' => $post->ID
        )
    );
}

add_action('wp_enqueue_scripts', 'load_my_script');

add_filter('use_block_editor_for_post', '__return_false', 10);

add_action('init', function () {
    remove_post_type_support('post', 'editor');
//    remove_post_type_support( 'page', 'editor' );
}, 99);


function custom_page_rewrite_rule()
{
    add_rewrite_rule('^home$', 'index.php?page_id=43', 'top');
}

add_action('init', 'custom_page_rewrite_rule');


function gandalf_widget_register(): void
{
    register_widget('gandalf_widget');
}

add_action('widgets_init', 'gandalf_widget_register');

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class gandalf_widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'gandalf_widget',
            __('Theme gandalf widget', 'gandalf_widget_theme'),
            ['description' => __('best widget !', 'gandalf_widget_theme')]
        );
    }

    public function form($instance)
    {
        $defaults = array(
            'fact-api' => '',
            'joke-api' => '',
            'air-api' => '',
            'air-city' => '',
        );
        extract(wp_parse_args(( array )$instance, $defaults));
        ?>

        <div>
            <h2>Select api for widget</h2>
            <div>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('fact-api')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('fact-api')); ?>"
                       value="fact-api" <?php checked('fact-api', $fact_api); ?>>

                <label for="<?php echo esc_attr($this->get_field_id('fact-api')); ?>"><?php _e('fact-api', 'text_domain'); ?></label>

            </div>
            <div>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('joke-api')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('joke-api')); ?>"
                       value="joke-api" <?php checked('joke-api', $joke_api); ?>>

                <label for="<?php echo esc_attr($this->get_field_id('joke-api')); ?>"><?php _e('joke-api', 'text_domain'); ?></label>

            </div>
            <div>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('air-api')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('air-api')); ?>"
                       value="air-api" <?php checked('air-api', $air_api); ?> >

                <label for="<?php echo esc_attr($this->get_field_id('air-api')); ?>"><?php _e('air-api', 'text_domain'); ?></label>
                <br>

                <label for="<?php echo esc_attr($this->get_field_id('air-city')); ?>"><?php _e('air-city', 'text_domain'); ?></label>

                <input type="text" id="<?php echo esc_attr($this->get_field_id('air-city')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('air-city')); ?>"
                       value="<?php echo esc_attr($air_city); ?>">
            </div>
        </div>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['fact-api'] = isset($new_instance['fact-api']) ? "fact-api" : false;
        $instance['joke-api'] = isset($new_instance['joke-api']) ? "joke-api" : false;
        $instance['air-api'] = isset($new_instance['air-api']) ? "air-api" : false;
        $instance['air-city'] = isset($new_instance['air-city']) ? wp_strip_all_tags($new_instance['air-city']) : '';
        return $instance;
    }

    public function widget($args, $instance)
    {
        extract($args);
        $fact_api = !empty($instance['fact-api']);
        $joke_api = !empty($instance['joke-api']);
        $air_api = !empty($instance['air-api']);
        $air_city = $instance['air-city'] ?? '';

        echo $args['before_widget'];
        if ($fact_api) {
            $url = "https://api.api-ninjas.com/v1/facts?limit=1";
            $api_response = $this->get_api_response($url, "fact");
            echo '<h3>Fact</h3>';
            echo '<p id="wiwip">' . esc_html($api_response) . '</p>';
        }
        if ($joke_api) {
            $url = "https://api.api-ninjas.com/v1/dadjokes?limit=1";
            $api_response = $this->get_api_response($url, "joke");
            echo '<h3>Joke</h3>';
            echo '<p id="wiwip">' . esc_html($api_response) . '</p>';
        }
        if ($air_api) {
            $url = "https://api.api-ninjas.com/v1/city?name=" . $air_city;
            $api_response = $this->get_api_response($url, "air");
            echo '<h3>City info</h3>';
            foreach ($api_response as $key => $value)
            {
                echo '<p id="wiwip">' . esc_html($key) ." : ". esc_html($value) . '</p>';
            }

        }

        echo $args['after_widget'];
    }

    private function get_api_response($url, $name)
    {

        $api_key = $_ENV['API_KEY'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "X-api-key: $api_key"
        ]);

        $res = curl_exec($curl);

        if (curl_errno($curl)) {
            $error = curl_error($curl);
        } else if ($name === "fact") {
            return json_decode($res, true)[0]['fact'];
        } else if ($name === "joke") {
            return json_decode($res, true)[0]['joke'];
        } else if ($name === "air") {
            return json_decode($res, true)[0];
        }

        curl_close($curl);
    }
}

function add_widget_area()
{
    register_sidebar([
        'name' => 'gandalf bar',
        'id' => 'gandalf_bar',
        'before_widget' => '
<div>',
        'after_widget' => '
</div>',
    ]);
}

add_action('widgets_init', 'add_widget_area');