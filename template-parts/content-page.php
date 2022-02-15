<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ThreadTheWord
 */

?>

    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('page-content__article'); ?>>
						<?php the_content(); ?>
                    </article>
                </div>
            </div>
        </div>
    </section>
