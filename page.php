<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ThreadTheWord
 */

get_header();
?>

    <section class="page-header">
        <div class="container <?php echo !is_user_logged_in() && is_account_page() ? 'no_login' : '' ?>">
            <?php
            $args = array(
                'delimiter' => ' > ' // меняем разделитель
            );
            if (!is_checkout())
                woocommerce_breadcrumb($args);

            if (!is_user_logged_in() && is_account_page()) {
                echo '<h1 class="page-header__title ">Login</h1>';
            } else {
                the_title('<h1 class="page-header__title">', '</h1>');

            }
            ?>
        </div>
    </section>

<?php
while (have_posts()) :
    the_post();

    get_template_part('template-parts/content', 'page');

    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;

endwhile; // End of the loop.
?>

<?php
get_footer();
