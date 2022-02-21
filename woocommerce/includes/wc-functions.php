<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('woocommerce_before_main_content', 'threadtheword_add_breadcrumbs', 20);
function threadtheword_add_breadcrumbs()
{
    ?>
    <div class="page-header">
        <div class="container">
            <?php
            if (is_product()) {
                $args = array('delimiter' => ' > ');
                woocommerce_breadcrumb($args);
            } elseif (is_product_category()) {
                $args = array('delimiter' => ' > ');
                woocommerce_breadcrumb($args);
                ?>
                <h1 class="page-header__title woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
                <?php if (is_product_category('giftcard')): ?>
                    <?php if ($giftcard_description = get_field('giftcard_description', 'options')): ?>
                        <div class="giftcard-description"> <?php echo $giftcard_description; ?> </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php
            } else {
                $args = array('delimiter' => ' > ');
                woocommerce_breadcrumb($args);
                ?>
                <h1 class="page-header__title woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
                <?php if (is_product_category('giftcard')): ?>
                    <?php if ($giftcard_description = get_field('giftcard_description', 'options')): ?>
                        <div class="giftcard-description"> <?php echo $giftcard_description; ?> </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}

add_filter('woocommerce_show_page_title', 'threadtheword_hide_product_page_title');
function threadtheword_hide_product_page_title($hide)
{
    if (is_shop()) {
        $hide = false;
    }
}

add_action('woocommerce_before_single_product', 'threadtheword_wrapper_product_start', 5);
function threadtheword_wrapper_product_start()
{
    ?>
    <div class="single-section">
    <div class="container">
    <?php
}

add_action('woocommerce_after_single_product', 'threadtheword_wrapper_product_end', 30);
function threadtheword_wrapper_product_end()
{
    ?>
    </div>
    </div>
    <?php
}

add_action('woocommerce_before_single_product_summary', 'threadtheword_wrapper_product_image_start', 5);
function threadtheword_wrapper_product_image_start()
{
    ?>
    <div class="col-md-7">
    <?php
}

add_action('woocommerce_before_single_product_summary', 'threadtheword_wrapper_product_image_end', 25);
function threadtheword_wrapper_product_image_end()
{
    ?>
    </div>
    <?php
}

add_action('woocommerce_before_single_product_summary', 'threadtheword_wrapper_product_entry_start', 30);
function threadtheword_wrapper_product_entry_start()
{
    ?>
    <div class="col-md-5">
    <?php
}

add_action('woocommerce_after_single_product_summary', 'threadtheword_wrapper_product_entry_end', 5);
function threadtheword_wrapper_product_entry_end()
{

    $heading = apply_filters('woocommerce_product_description_heading', __('PRODUCT INFORMATION', 'woocommerce'));

    $product_title = get_the_title();
    $product_url = get_permalink();
    $product_img = wp_get_attachment_url(get_post_thumbnail_id());

    // $insagram_url 	= 'https://www.instagram.com/sharer/sharer.php?u=' . $product_url;
    $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . $product_url;
    $twitter_url = 'https://twitter.com/intent/tweet?status=' . rawurlencode($product_title) . '+' . $product_url;
    $pinterest_url = 'https://pinterest.com/pin/create/bookmarklet/?media=' . $product_img . '&url=' . $product_url . '&is_video=false&description=' . rawurlencode($product_title);
    $email_url = 'mailto:?subject=' . rawurlencode($product_title) . '&body=' . $product_url;

    ?>
    <div class="product_desktop">
        <div class="product_info">
            <?php if ($heading) : ?>
                <h2 class="product_info-title"><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>
            <div class="product_info-desc">
                <?php the_content(); ?>
            </div>
        </div>

        <div class="share">
            <div class="share_title">SHARE</div>
            <ul class="share_list">
                <li class="share_item">
                    <a href="#sub-menus"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon-product-1.svg"
                                alt=""></a>
                    <ul class="sub-share_list">
                        <li class="sub-share_item"><a href="<?php echo esc_url($facebook_url); ?>"><img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon-share-1.svg"
                                        alt=""></a></li>
                        <li class="sub-share_item"><a href="<?php echo esc_url($twitter_url); ?>"><img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon-share-2.svg"
                                        alt=""></a></li>
                        <li class="sub-share_item"><a href="<?php echo esc_url($pinterest_url); ?>"><img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon-share-3.svg"
                                        alt=""></a></li>
                        <li class="sub-share_item"><a href="<?php echo esc_url($email_url); ?>"><img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon-share-4.svg"
                                        alt=""></a></li>
                    </ul>
                </li>
                <li class="share_item">
                    <a href="<?php the_field('footer_bottom_facebook_link', 'options'); ?>" target="_blank"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon-product-2.svg"
                                alt=""></a>
                </li>
                <li class="share_item">
                    <a href="<?php the_field('footer_bottom_instagram_link', 'options'); ?>" target="_blank"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon-product-3.svg"
                                alt=""></a>
                </li>
            </ul>
        </div>
    </div>
    <?php

    ?>
    </div>
    <?php
}

add_action('woocommerce_before_single_product_summary', 'threadtheword_wrapper_product_row_start', 3);
function threadtheword_wrapper_product_row_start()
{
    ?>
    <div class="row">
    <?php
}

add_action('woocommerce_after_single_product_summary', 'threadtheword_wrapper_product_row_end', 30);
function threadtheword_wrapper_product_row_end()
{
    ?>
    </div>
    <?php
}


remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_after_add_to_cart_quantity', 'threadtheword_template_single_price', 25);
function threadtheword_template_single_price()
{
    global $product;
    if ($product->is_type('variable')) return '';
    ?>
    <div class="price">
        <?php echo $product->get_price_html(); ?>
        <div class="price-desc">Excluding delivery</div>
    </div>
    <?php
}


add_action('woocommerce_after_single_product_summary', 'threadtheword_after_single_product_summary', 5);
function threadtheword_after_single_product_summary()
{
    $heading = apply_filters('woocommerce_product_description_heading', __('PRODUCT INFORMATION', 'woocommerce'));

    ?>
    <div class="col-12">
        <div class="product_mob">
            <div class="product_info">
                <?php if ($heading) : ?>
                    <h2 class="product_info-title"><?php echo esc_html($heading); ?></h2>
                <?php endif; ?>
                <div class="product_info-desc">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="share">
                <div class="share_title">SHARE</div>
                <ul class="share_list">
                    <li class="share_item">
                        <a href="#"><img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon-product-1.svg"
                                    alt=""></a>
                    </li>
                    <li class="share_item">
                        <a href="<?php the_field('footer_bottom_facebook_link', 'options'); ?>"><img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon-product-2.svg"
                                    alt=""></a>
                    </li>
                    <li class="share_item">
                        <a href="<?php the_field('footer_bottom_instagram_link', 'options'); ?>"><img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon-product-3.svg"
                                    alt=""></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    woocommerce_upsell_display(0, 4);
}

/**
 *
 * Product Catalog
 *
 * **/

add_action('woocommerce_before_shop_loop', 'threadtheword_before_shop_loop_start', 35);
function threadtheword_before_shop_loop_start()
{
    ?>
    <section class="products">
    <div class="container">
    <div class="row">
    <?php
}

add_action('woocommerce_after_shop_loop', 'threadtheword_after_shop_loop_end', 5);
function threadtheword_after_shop_loop_end()
{
    ?>
    </div>
    </div>
    </section>
    <?php
}

/**
 *
 * Wrapper Product Title+Price
 *
 **/

add_action('woocommerce_shop_loop_item_title', 'threadtheword_wrapper_product_title_start', 5);
function threadtheword_wrapper_product_title_start()
{
    ?>
    <div class="products__text">
    <?php
}

add_action('woocommerce_after_shop_loop_item_title', 'threadtheword_wrapper_product_title_end', 15);
function threadtheword_wrapper_product_title_end()
{
    ?>
    </div>
    <?php
}

/**
 *
 * Wrapper Product Image
 *
 **/

add_action('woocommerce_before_shop_loop_item_title', 'threadtheword_wrapper_product_catalog_image_start', 5);
function threadtheword_wrapper_product_catalog_image_start()
{
    ?>
    <a class="product-permalink-image" href="<?php the_permalink(); ?>"> <div class="products__image">
    <?php if (is_product_category('by-style') || is_product_category('by-size') || is_product_category('blankets')) {
    $product = wc_get_product();
    ?>
    <div class="products__image-text"><?php echo $product->get_meta('_text_field', true); ?></div>
    <?php
}

    ?>
    <?php
}

add_action('woocommerce_before_shop_loop_item_title', 'threadtheword_wrapper_product_catalog_image_end', 15);
function threadtheword_wrapper_product_catalog_image_end()
{
    ?>
    </div></a>
    <?php
}


add_action('woocommerce_after_shop_loop_item_title', 'threadtheword_product_short_description', 8);
function threadtheword_product_short_description($content)
{
    if (is_product_category() || is_product()) {
        global $post, $product;
        $short_description = apply_filters('woocommerce_short_description', $post->post_excerpt);
        ?>
        <div class="products__desc"><a href="<?php the_permalink(); ?>"> <?php echo $short_description; ?> </a></div>
        <?php
    }
    ?>

    <?php
}


add_action('woocommerce_product_options_general_product_data', 'threadtheword_woocommerce_add_custom_fields');
function threadtheword_woocommerce_add_custom_fields()
{
    global $product, $post;
    echo '<div class="options_group">';

    woocommerce_wp_text_input(array(
        'id' => '_text_field',
        'label' => __('Product Size', 'woocommerce'),
        'placeholder' => 'Example: XXL',
        'desc_tip' => 'true',
        'custom_attributes' => array('required' => 'required'),
        'description' => __('Enter the field value here', 'woocommerce'),
    ));
    echo '</div>';
}


add_action('woocommerce_process_product_meta', 'threadtheword_woocommerce_custom_fields_save', 10);
function threadtheword_woocommerce_custom_fields_save($post_id)
{

    // Сохранение текстового поля.
    $woocommerce_text_field = $_POST['_text_field'];
    if (!empty($woocommerce_text_field)) {
        update_post_meta($post_id, '_text_field', esc_attr($woocommerce_text_field));
    }
}


function remove_featured_image($html, $attachment_id)
{

    global $post, $product;

    if ($product->is_type('variable')) return $html;

    $featured_image = get_post_thumbnail_id($product->ID);

    if (has_term('giftcard', 'product_cat')) {
        return $html;
    } else {
        if ($attachment_id == $featured_image) {
            $html = '';
        }

        return $html;
    }
}

add_filter('woocommerce_single_product_image_thumbnail_html', 'remove_featured_image', 10, 2);


function woocommerce_product_custom_fields()
{
    $args = array(
        'id' => 'woocommerce_custom_fields',
        'label' => __('Add Input Product  Fields'),
    );
    woocommerce_wp_text_input($args);
}

add_action('woocommerce_product_options_advanced', 'woocommerce_product_custom_fields');


function save_woocommerce_product_custom_fields($post_id)
{
    $product = wc_get_product($post_id);
    $custom_fields_woocommerce_title = isset($_POST['woocommerce_custom_fields']) ? $_POST['woocommerce_custom_fields'] : '';
    $product->update_meta_data('woocommerce_custom_fields', sanitize_text_field($custom_fields_woocommerce_title));
    $product->save();
}

add_action('woocommerce_process_product_meta', 'save_woocommerce_product_custom_fields');

function woocommerce_custom_fields_display()
{

    global $post, $product;
    if ($product->is_type('variable')) return '';


    $product = wc_get_product($post->ID);
    $custom_fields_woocommerce_title = $product->get_meta('woocommerce_custom_fields');
    if ($custom_fields_woocommerce_title) {
        printf(
            '<div class="w-100"><label>%s </label><input type="text" id="woocommerce_product_custom_fields_title" name="woocommerce_product_custom_fields_title" value=""></div>',
            esc_html($custom_fields_woocommerce_title)
        );
    }
}

add_action('woocommerce_before_add_to_cart_form', 'woocommerce_custom_fields_display');

add_filter('woocommerce_shipping_package_name', function ($package_name, $i, $package) {
    if ($package_name === 'Shipping')
        $package_name = __('Shipping Methods');
    return $package_name;
}, 10, 3);

if (class_exists('WC_Gateway_Afterpay')) {

    $gateway = WC_Gateway_Afterpay::getInstance();

    remove_action('woocommerce_cart_totals_after_order_total', array($gateway, 'render_cart_page_elements'), 10, 0);
    add_action('woocommerce_proceed_to_checkout', array($gateway, 'render_cart_page_elements'), 20);

}

add_filter('woocommerce_form_field', function ($field, $key, $args, $value) {
    if ($key == 'billing_country' || $key == 'billing_address_2') return '';
    return $field;
}, 10, 4);


add_filter('woocommerce_form_field_args', function (array $args, string $key) {

    if ($key !== 'order_enter_a_message')
        $args['placeholder'] = $args['label'];

    if ($key === 'billing_company') {
        $args['placeholder'] = __("Company");
    }
    if ($key === 'order_comments') {
        $args['placeholder'] = __('Notes about order or special delivery instructions');
    }
    if ($key === 'billing_email') {
        $args['placeholder'] = __('Email');
    }
    if ($key === 'billing_state' || $key === 'billing_city') {
        if (false !== $key = array_search('w-66', $args['class'])) {
            unset($args['class'][$key]);
        }
        $args['class'][] = 'form-row-first';
    }

    if ($key === 'billing_phone' || $key === 'billing_postcode') {
        if (false !== $key = array_search('w-33', $args['class']))
            unset($args['class'][$key]);
        if (false !== $key = array_search('pl-5', $args['class']))
            unset($args['class'][$key]);

        $args['class'][] = 'form-row-last';
    }

    if ($key === 'order_comments' || $key === 'order_enter_a_message') {
        $args['custom_attributes']['rows'] = 5;

    }
    if ($key !== 'order_send_as_a_gift_tick_') {
        $args['label'] = '';
    }
    if ($key === 'order_enter_a_message') {
        $args['label'] = __('Enter a message you would like us to include in the order. (no invoice or receipt will be included)');
    }


    return $args;
}, 10, 2);

function woo_override_checkout_fields_billing($fields)
{

    $fields['billing']['billing_country'] = array(
        'type' => 'select',
        'label' => __('My New Country List', 'woocommerce'),
    );

    return $fields;
}

add_filter('woocommerce_checkout_fields', 'woo_override_checkout_fields_billing');

remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);

add_action('woocommerce_review_order_pre_before_shipping', 'woocommerce_checkout_coupon_form');

add_filter('woocommerce_order_button_text', function ($title) {
    return __('Complete secure payment');
});


add_filter('wp_footer', function () {

    global $product;
    if ($product) {
        $attributes = $product->get_attributes();
        $personalis = !empty($attributes['cc_editor']) && !empty($attributes['cc_editor_config']);
        if ($personalis)
            echo
            '
				<script>
				jQuery(".personalise_add_to_cart:not(.disabled)").on("click",function(event){
    event.preventDefault();
    if( jQuery("#rnoc-add-to-cart-add-on")&&!jQuery(this).hasClass("disabled"))
      jQuery("#rnoc-add-to-cart-add-on").show();

})
				</script>';
    }
});
