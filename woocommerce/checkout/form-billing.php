<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined('ABSPATH') || exit;
$fields = $checkout->get_checkout_fields('billing');
$email = $fields['billing_email'];
unset($fields['billing_email'])
?>
<div class="woocommerce-billing-fields">

    <div>
        <h3><?php esc_html_e('Contact', 'woocommerce'); ?></h3>
        <div class="woocommerce-billing-fields__field-wrapper">
            <?php


            woocommerce_form_field('billing_email', $email, $checkout->get_value('billing_email'));


            ?>
        </div>
        <?php if (!is_user_logged_in() && $checkout->is_registration_enabled()) : ?>
            <div class="woocommerce-account-fields">
                <?php if (!$checkout->is_registration_required()) : ?>

                    <p class="form-row form-row-wide create-account">
                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                            <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
                                   id="createaccount" <?php checked((true === $checkout->get_value('createaccount') || (true === apply_filters('woocommerce_create_account_default_checked', false))), true); ?>
                                   type="checkbox" name="createaccount" value="1"/>
                            <span><?php esc_html_e('Create an account?', 'woocommerce'); ?></span>
                        </label>
                    </p>

                <?php endif; ?>

                <?php do_action('woocommerce_before_checkout_registration_form', $checkout); ?>

                <?php if ($checkout->get_checkout_fields('account')) : ?>

                    <div class="create-account">
                        <?php foreach ($checkout->get_checkout_fields('account') as $key => $field) : ?>
                            <?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
                        <?php endforeach; ?>
                        <div class="clear"></div>
                    </div>

                <?php endif; ?>

                <?php do_action('woocommerce_after_checkout_registration_form', $checkout); ?>
            </div>
        <?php endif; ?>
        <?php do_action('woocommerce_after_checkout_billing_form', $checkout); ?>


        <p class="form-row form-row validate- subscribe-checkbox" id="billing_subscribe_to_our_newsletter_field"
           data-priotiry="120">
            <label for="billing_subscribe_to_our_newsletter">
                <input type="checkbox" class="input-checkbox input-inspirecheckbox"
                       name="billing_subscribe_to_our_newsletter" id="billing_subscribe_to_our_newsletter" value="Yes"
                       checked="" data-qa-id="Subscribe to our newsletter receive awesome offers and news!">
                <?php _e('Keep me updated on news and exclusive offers'); ?> </label>
        </p>
    </div>


    <?php if (wc_ship_to_billing_address_only() && WC()->cart->needs_shipping()) : ?>

        <h3><?php esc_html_e('Shipping Address', 'woocommerce'); ?></h3>

    <?php else : ?>

        <h3><?php esc_html_e('Billing details', 'woocommerce'); ?></h3>

    <?php endif; ?>

    <?php do_action('woocommerce_before_checkout_billing_form', $checkout); ?>

    <div class="woocommerce-billing-fields__field-wrapper">
        <?php
        foreach ($fields as $key => $field) {
            woocommerce_form_field($key, $field, $checkout->get_value($key));
        }
        ?>
    </div>


</div>

