<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

wc_print_notices();

if ( is_user_logged_in() ) {
    ?>
        <div class="signin-info">You are already authorized on the site, go to <a href="/my-account/">My Account</a></div>
    <?php
}
else {
    ?>
    <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

    <!-- <h2><?php // esc_html_e( 'Register', 'woocommerce' ); ?></h2> -->

    <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
        <?php
        $first_name = ( ! empty( $_POST['first_name'] ) ) ? trim( $_POST['first_name'] ) : '';
        $last_name = ( ! empty( $_POST['last_name'] ) ) ? trim( $_POST['last_name'] ) : '';
        ?>

        <div class="row">

            <div class="col-xl-6 col-lg-6">
                <input type="text" name="first_name" id="first_name" class="input create-account__input" placeholder="<?php _e( 'First Name', 'threadtheword' ) ?>" value="<?php echo esc_attr( wp_unslash( $first_name ) ); ?>" />
            </div>

            <div class="col-xl-6 col-lg-6">
                <input type="text" name="last_name" id="last_name" class="input create-account__input" placeholder="<?php _e( 'Last Name', 'threadtheword' ) ?>" value="<?php echo esc_attr( wp_unslash( $last_name ) ); ?>" />
            </div>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                <div class="col-xl-6 col-lg-6 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text create-account__input" placeholder="<?php esc_html_e( 'Username', 'woocommerce' ); ?>" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                </div>

            <?php endif; ?>

            <div class="col-xl-6 col-lg-6 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text create-account__input" placeholder="<?php esc_html_e( 'Email', 'woocommerce' ); ?>" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
            </div>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                <div class="col-xl-6 col-lg-6 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text create-account__input"placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>" name="password" id="reg_password" autocomplete="new-password" />
                </div>

            <?php else : ?>

                <p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

            <?php endif; ?>

            <div class="col-12 woocommerce-form-row form-row">
                <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit create-account__btn btn" name="register" value="<?php esc_attr_e( 'Create Account', 'woocommerce' ); ?>"><?php esc_html_e( 'Create Account', 'woocommerce' ); ?></button>
            </div>

        </div>

    </form>

    <?php endif; ?>
<?php
}
?>