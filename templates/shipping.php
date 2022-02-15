<?php 
/** 
* Template Name: Page Shipping
*/

get_header();
?>

    <section class="page-header">
        <div class="container">
            <?php 
            $args = array(
                'delimiter' => ' > ' // меняем разделитель
            );
            woocommerce_breadcrumb( $args ); 
            
            the_title( '<h1 class="page-header__title">', '</h1>' ); 
            ?>
        </div>
    </section>

    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7 order-xl-0 order-lg-0 order-1">
                    <article class="page-content__article">
                        <?php the_content(); ?>
                    </article>
                </div>
                <div class="col-xl-5 col-lg-5 order-xl-1 order-lg-1 order-0">
                    <div class="page-content__image">
	                    <?php if ( has_post_thumbnail()) { ?>
		                    <?php the_post_thumbnail(); ?>
	                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="page-banner__image">
                    <img src="<?php the_field('shipping_image_bottom'); ?>" alt="Image Bottom to section faq">
                </div>
            </div>
        </div>
    </section>

<?php 
get_footer();