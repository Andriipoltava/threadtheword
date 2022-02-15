<?php 
/** 
* Template Name: Page Create Account
*/
?>

<?php get_header(); ?>

    <section class="page-header welcome-create-account">
        <div class="container">
            <div class="breadcrumbs">

            </div>
            <h1 class="page-header__title"><?php the_field('createaccount_title'); ?></h1>
            <p class="page-header__desc"><?php the_field('createaccount_description'); ?></p>
        </div>
    </section>


    <section class="create-account">
        <div class="container">
            <div class="row">
                <div class="col-xl-10">
                    <?php get_template_part('/woocommerce/includes/parts/wc-form', 'register'); ?>
                </div>
            </div>
        </div>
    </section>


    <section class="page-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="page-banner__image">
                    <img src="<?php the_field('createaccount_image_bottom'); ?>" alt="Image Bottom to section create account">
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>