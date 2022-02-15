<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThreadTheWord
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div class="wrapper">
    <div class="content">

    <div class="notification">
        <a href="<?php the_field('header_button_link', 'options'); ?>" class="notification__text"><?php the_field('header_text', 'options'); ?></a>
    </div>

    <header class="header">
        <div class="container">
            <div class="header__wrap">
                <a href="/" class="header__logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/logo.svg" alt="thread-logo" width="128px" height="71px"></a>
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'menu-1',
                            'container' 	  => 'nav',
                            'container_class' => 'menu',
                            'menu_class'      => 'menu__list',
                            //'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                        )
                    );
                ?>
                <div class="header__burger">
                    <div class="icon">
                        <ul class="icon__list">
<!--                             <li class="currency-item">
                                <?php echo do_shortcode( '[woocs sd=1]' ); ?>
                            </li> -->
                            <li class="icon__list-item">
                                <a href="#" class="a1">
                                    <div class="icon-search"></div>
                                </a>
                            </li>
                            <li class="icon__list-item">
                                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="">
                                    <div class="icon-login"></div>
                                </a>
                            </li>
                            <li class="icon__list-item">
                                <a href="#">
	                                <?php threadtheword_woocommerce_cart_link(); ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="menu__burger">
                        <span></span>
                    </div>
                </div>
                <div class="header__icon icon">
                    <ul class="icon__list">
<!--                         <li class="currency-item">
                            <?php echo do_shortcode( '[woocs sd=1]' ); ?>
                        </li> -->
                        <li class="icon__list-item">
                            <a href="#" class="a1">
                                <div class="icon-search"></div>
                            </a>
                        </li>
                        <li class="icon__list-item">
                            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="">
                                <div class="icon-login"></div>
                            </a>
                        </li>
                        <li class="icon__list-item">
                            <?php threadtheword_woocommerce_cart_link(); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
