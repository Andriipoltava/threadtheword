<?php

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'threadtheword_woocommerce_header_cart' ) ) {
			threadtheword_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'threadtheword_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function threadtheword_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		threadtheword_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'threadtheword_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'threadtheword_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function threadtheword_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'threadtheword' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'threadtheword' ),
				WC()->cart->get_cart_contents_count()
			);
			?>

            <?php 
            
                $cart_items_count = WC()->cart->get_cart_contents_count();
            
                if( WC()->cart->get_cart_contents_count() >= 1){
                    ?>
                    <div class="icon-cart"><span class="number"><?php echo WC()->cart->get_cart_contents_count() ?></span></div>
                    <?php
                }else {
                    ?>
                    <div class="icon-cart"></div>
                    <?php
                }

            ?>
		</a>
		<?php
	}
}

if ( ! function_exists( 'threadtheword_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function threadtheword_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php threadtheword_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}