<?php 
/** 
* Template Name: Page Gallery
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

    <section class="gallery">
        <div class="container">
            <div class="row">
	                <?php
	                $images = get_field('gallery');
	                $size = 'full';
	                if( $images ): ?>
                        <?php foreach( $images as $image ): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                                <a href="<?php echo $image['url']; ?>" data-fancybox="gallery" class="gallery__item">
					                <?php echo wp_get_attachment_image( $image, $size ); ?>
                                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                                </a>
                            </div>
                        <?php endforeach; ?>
	                <?php endif; ?>
            </div>
        </div>
    </section>

<?php 
get_footer();