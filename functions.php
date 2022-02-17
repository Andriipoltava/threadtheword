<?php
/**
 * ThreadTheWord functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ThreadTheWord
 */


if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('threadtheword_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function threadtheword_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on ThreadTheWord, use a find and replace
         * to change 'threadtheword' to the name of your theme in all the template files.
         */
        load_theme_textdomain('threadtheword', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        add_theme_support('woocommerce', array(
            'thumbnail_image_width' => 600,
            'single_image_width' => 600,
        ));

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Header Nav', 'threadtheword'),
                'menu-column-1' => esc_html__('Footer Column Nav 1', 'threadtheword'),
                'menu-column-2' => esc_html__('Footer Column Nav 2', 'threadtheword'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background',
            apply_filters('threadtheword_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         * size-woocommerce_thumbnail
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo',
            array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
                'header-text' => array('site-title', 'site-description'),
            )
        );
    }
endif;
add_action('after_setup_theme', 'threadtheword_setup');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function threadtheword_content_width()
{
    $GLOBALS['content_width'] = apply_filters('threadtheword_content_width', 640);
}

add_action('after_setup_theme', 'threadtheword_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function threadtheword_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'threadtheword'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'threadtheword'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'threadtheword_widgets_init');


/**
 * Enqueue styles.
 */
function threadtheword_style()
{
    wp_enqueue_style('threadtheword-style', get_template_directory_uri() . '/assets/css/style.css', array(), time());
    wp_enqueue_style('thread', get_template_directory_uri() . '/assets/css/thread.css', array(), null);
    wp_enqueue_style('threadtheword-fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.css', array(), null);
    wp_enqueue_style('slick-style', get_template_directory_uri() . '/assets/css/slick-slider.css', array(), null);
}

add_action('wp_enqueue_scripts', 'threadtheword_style');

/**
 * Enqueue scripts and styles.
 */
function threadtheword_scripts()
{
    wp_enqueue_script('slick-script', get_template_directory_uri() . '/assets/js/slick.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('threadtheword-global', get_template_directory_uri() . '/assets/js/global.js', array(), _S_VERSION, true);
    //	wp_enqueue_script('threadtheword-script', get_template_directory_uri() . '/assets/js/script.min.js', array(), _S_VERSION, true );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'threadtheword_scripts');


//2. Add validation. In this case, we make sure first_name and last_name is required.
add_filter('registration_errors', 'threadtheword_registration_errors', 10, 3);
function threadtheword_registration_errors($errors, $sanitized_user_login, $user_email)
{

    if (empty($_POST['first_name']) || !empty($_POST['first_name']) && trim($_POST['first_name']) == '') {
        $errors->add('first_name_error', __('<strong>ERROR</strong>: You must include a first name.', 'threadtheword'));
    }
    if (empty($_POST['last_name']) || !empty($_POST['last_name']) && trim($_POST['last_name']) == '') {
        $errors->add('last_name_error', __('<strong>ERROR</strong>: You must include a last name.', 'threadtheword'));
    }
    return $errors;
}

//3. Finally, save our extra registration user meta.
add_action('user_register', 'threadtheword_user_register');
function threadtheword_user_register($user_id)
{
    if (!empty($_POST['first_name'])) {
        update_user_meta($user_id, 'first_name', trim($_POST['first_name']));
        update_user_meta($user_id, 'last_name', trim($_POST['last_name']));
    }
}

//Adding ACF Theme Options
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));

}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
    require get_template_directory() . '/woocommerce/includes/wc-functions.php';
    require get_template_directory() . '/woocommerce/includes/wc-functions-remove.php';
    require get_template_directory() . '/woocommerce/includes/wc-functions-cart.php';
}

add_filter('woocommerce_get_item_data', 'wc_checkout_description', 10, 2);
function wc_checkout_description($other_data, $cart_item)
{
    $post_data = get_post($cart_item['product_id']);
    $other_data[] = array('name' => $post_data->post_content);
    return $other_data;
}


add_action('wp_footer', function () {
    if (!is_cart()) {
        return;
    }
    ?>
    <script>
        jQuery(function ($) {
            var delay;
            $('.woocommerce').on('change', '.qty', function () {
                if (undefined !== delay) {
                    clearTimeout(delay);
                }
                delay = setTimeout(
                    function () {
                        $('[name="update_cart"]').trigger('click');
                    },
                    500
                );

            });
            $('.woocommerce').on('click', '.plus, .minus', function () {
                setTimeout(function () {
                    $('[name="update_cart"]').removeAttr('disabled');
                    $('[name="update_cart"]').trigger('click');
                }, 500);
            });
        });
    </script>
    <style>
        .woocommerce [name="update_cart"] {
            display: none;
        }
    </style>
    <?php
}
);



remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
function change_product_title()
{
    global $product;
    echo '<a href="' . esc_attr($product->get_permalink()) . '"> <h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2></a>';
}

add_action('woocommerce_shop_loop_item_title', 'change_product_title');

//  Campaign Monitor API
function woo_subscribe_to_our_newsletter($order_id)
{
    $order = new WC_Order($order_id);

    if ($order->get_meta('billing_subscribe_to_our_newsletter') == 'Yes' || get_post_meta($order_id, '_created_via', true) == 'Etsy') {
        order_send_com($order);
    }

}

// save fields to order meta
add_action('woocommerce_checkout_update_order_meta', 'woo_subscribe_to_our_newsletter');
add_action('woocommerce_order_status_processing_to_completed', 'woo_subscribe_to_our_newsletter');

function some_custom_checkout_field_update_order_meta($order_id)
{
    if (!empty($_POST['billing_subscribe_to_our_newsletter'])) {
        $order = new WC_Order($order_id);
        add_post_meta($order_id, 'billing_subscribe_to_our_newsletter', sanitize_text_field($_POST['billing_subscribe_to_our_newsletter']));
        order_send_com($order);

    }
}

add_action('woocommerce_checkout_update_order_meta', 'some_custom_checkout_field_update_order_meta');
function order_send_com($order)
{
    require_once __DIR__ . '/vendor/autoload.php';
    $auth = array('access_token' => 'AT6L8PcqPHxHk7fKBlZlGiY5',
        'refresh_token' => 'AeTGTWOwnxRMqNqF0F81uWs5');
    $wrap = new CS_REST_Subscribers('129b9f2f1e0183517bd317bc98b51182', $auth);
    $result = $wrap->add(array(
        'EmailAddress' => $order->get_billing_email(),
        'Name' => $order->get_billing_first_name(),
        'CustomFields' => array(
            array(
                'Key' => "Price",
                'Value' => $order->get_total()
            ),),
        'ConsentToTrack' => 'yes',
        'Resubscribe' => true
    ));
    return $result;
}
