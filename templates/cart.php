<?php 
/** 
* Template Name: Page Cart
*/
?>

<?php get_header(); ?>

    <section class="cart">
        <div class="container">
            <h1 class="cart-title"> <?php the_title(); ?> </h1>
            <?php the_content(); ?>
        </div>
    </section>

<?php get_footer(); ?>