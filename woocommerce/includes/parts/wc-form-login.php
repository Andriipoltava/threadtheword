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
	<div class="signin">
		<form class="woocommerce-form woocommerce-form-login login" method="post">

			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text create-account__input" placeholder="<?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			<input class="woocommerce-Input woocommerce-Input--text input-text create-account__input" type="password" placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>" name="password" id="password" autocomplete="current-password" />

			<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

			<p class="woocommerce-LostPassword lost_password">
				<a class="signin__link" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Forgot your password?', 'woocommerce' ); ?></a>
			</p>
			<button type="submit" class="woocommerce-button button woocommerce-form-login__submit create-account__btn btn" name="login" value="<?php esc_attr_e( 'SIGN IN', 'woocommerce' ); ?>"><?php esc_html_e( 'SIGN IN', 'woocommerce' ); ?></button>

		</form>
	</div>
	<div class="header__login-line"></div>
	<div class="register">
		<div class="register__title">NEW CUSTOMER?</div>
		<div class="register__desc">Sign up for an account to track your orders and history information.</div>
		<a href="/CREATE-ACCOUNT/" class="create-account__btn btn">CREATE ACCOUNT</a>
	</div>
	<?php
}

?>