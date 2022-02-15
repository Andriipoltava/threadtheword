<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThreadTheWord
 */


?>


	</div><!-- /content -->

	<section class="advantages">
        <div class="container">
	        <?php if ( have_rows( 'advantages_items', 'options' ) ): ?>
            <div class="row" style="justify-content: center">
                <?php while ( have_rows( 'advantages_items', 'options' ) ): the_row(); ?>
                    <div class="col-xl-3 col-lg-3 col-6">
                        <div class="advantages__item">
                            <?php if( $image_item = get_sub_field('image_item', 'options') ): ?>
                                <div class="advantages__image">
                                    <img src="<?php echo esc_url($image_item['url']); ?>"
                                         alt="<?php echo esc_attr($image_item['alt']); ?>"/>
                                </div>
                            <?php endif; ?>
                            <div class="advantages__text">
                                <?php if( $title_item = get_sub_field('title_item') ): ?>
                                    <div class="advantages__title"> <?php echo $title_item; ?> </div>
                                <?php endif; ?>

                                <?php if( $description_item = get_sub_field('description_item') ): ?>
                                    <div class="advantages__desc"> <?php echo $description_item; ?> </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>


	<footer class="footer" id="footer">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-6">
					<div class="footer-top__subscribe">
                        <?php if( $footer_email_title = get_field('footer_email_title', 'options') ): ?>
                            <div class="footer__title">
                                <?php echo $footer_email_title; ?>
                            </div>
                        <?php endif; ?>

                        <?php if( $footer_email_desc = get_field('footer_email_desc', 'options') ): ?>
                            <p class="footer__text">
                                <?php echo $footer_email_desc; ?>
                            </p>
                        <?php endif; ?>
                        <?php echo do_shortcode('[cm_form form_id="cm_6128f6a07a908"]'); ?>


                        <!--						--><?php //echo do_shortcode('[contact-form-7 id="356" title="Email Form Footer"]'); ?>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6">
					<div class="footer__menu-wrap">
						<div class="footer__menu-column">
                            <?php if( $footer_menu_title_left = get_field('footer_menu_title_left', 'options') ): ?>
							    <div class="footer__menu-title"> <?php echo $footer_menu_title_left; ?> </div>
                            <?php endif; ?>
							<?php
								wp_nav_menu(
									array(
										'theme_location'  => 'menu-column-1',
										'container' 	  => 'ul',
										'menu_class'      => 'footer__menu-list',
										//'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
									)
								);
							?>
						</div>
						<div class="footer__menu-column">
                            <?php if( $footer_menu_title_center = get_field('footer_menu_title_center', 'options') ): ?>
							    <div class="footer__menu-title"> <?php echo $footer_menu_title_center; ?> </div>
                            <?php endif; ?>
							<?php
								wp_nav_menu(
									array(
										'theme_location'  => 'menu-column-2',
										'container' 	  => 'ul',
										'menu_class'      => 'footer__menu-list',
										//'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
									)
								);
							?>

						</div>
						<div class="footer__menu-column">
                            <?php if( $footer_menu_title_right = get_field('footer_menu_title_right', 'options') ): ?>
							    <div class="footer__menu-title"> <?php echo $footer_menu_title_right; ?> </div>
                            <?php endif; ?>

							<?php if (have_rows('footer_content_right', 'options') ): ?>
                                <ul class="footer__menu-list">
                                    <?php while (have_rows('footer_content_right', 'options') ): the_row(); ?>
	                                    <?php if( $list_item = get_sub_field('list_item', 'options') ) :
		                                    $link_url = $list_item['url'];
		                                    $link_title = $list_item['title'];
		                                    $link_target = $list_item['target'] ? $list_item['target'] : '_self';
		                                    ?>
                                            <li class="footer-link-item">
                                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                            </li>
	                                    <?php endif; ?>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
						</div>
					</div>

                    <?php if( $footer_payment_logos = get_field('footer_payment_logos', 'options' ) ): ?>
                        <div class="footer-payments-logo">
                            <img
                                 src="<?php echo esc_url( $footer_payment_logos['url'] ); ?>"
                                 alt="<?php echo esc_attr( $footer_payment_logos['alt'] ); ?>"/>
                        </div>
                    <?php endif; ?>
				</div>
			</div>
		</div>
	</footer>

	<section class="footer-bottom">
		<div class="footer-bottom__wrap">
            <?php if( $footer_bottom_copyright_text = get_field('footer_bottom_copyright_text', 'options') ): ?>
                <div class="footer-bottom__copy"> <?php echo $footer_bottom_copyright_text; echo date(' Y'); ?> </div>
            <?php endif; ?>
			<ul class="footer-bottom__social">
                <?php if( $footer_bottom_instagram_link = get_field('footer_bottom_instagram_link', 'options') ): ?>
				    <li><a href="<?php echo $footer_bottom_instagram_link; ?>" target="_block"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon-insta.svg" alt="Icon Facebook"></a></li>
                <?php endif; ?>

                <?php if( $footer_bottom_facebook_link = get_field('footer_bottom_facebook_link', 'options') ): ?>
				    <li><a href="<?php echo $footer_bottom_facebook_link; ?>" target="_block"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon-fb.svg" alt="Icon Instagram"></a></li>
                <?php endif; ?>
			</ul>
		</div>
	</section>

	<!-- Model -->

    <div id="m1" class="header-bg-1">
        <div class="header__search search-modal">
			<form action="<?php esc_url( home_url( '/' ) ); ?>" method="post">
				<input type="text" value="<?php get_search_query(); ?>" name="s" class="search-modal__input" placeholder="Search...">
				<button type="submit" class="search-modal__btn btn">Search</button>
			</form>
        </div>
    </div>

    <div id="m2" class="header-bg-2">
        <div class="header__login">
			<?php get_template_part('/woocommerce/includes/parts/wc-form', 'login'); ?>
        </div>
    </div>

<div class="header-bg"></div>
    <!-- /Model -->

</div><!-- /wrapper -->



<?php wp_footer(); ?>


</body>
</html>
