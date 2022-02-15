<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ThreadTheWord
 */

get_header();
?>

    <section class="search-block">
        <div class="container">

            <?php if (have_posts('products')) : ?>

            <header class="page-header">
                <h1 class="page-header__title">
                    <?php
                    /* translators: %s: search query. */
                    printf(esc_html__('Search Results for: %s', 'threadtheword'), '<span>' . get_search_query() . '</span>');
                    ?>
                </h1>
            </header><!-- .page-header -->

            <div class="row">
                <?php
                /* Start the Loop */
                while (have_posts('products')) :
                    the_post();
                    echo "<div class='col-xl-3 col-lg-3 col-md-4 col-sm-6'>";

                    /**
                     * Run the loop for the search to output the results.
                     * If you want to overload this in a child theme then include a file
                     * called content-search.php and that will be used instead.
                     */
                    get_template_part('template-parts/content', 'search');

                    echo "</div>";

                endwhile;

                the_posts_navigation();

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>

            </div>
        </div>
    </section>


    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            var baseUrl = "https://cc.pbssolutions.com.au/apps/design-editor/stable";

            var apiKey = "UniqueSecurityKey";

            var uploadTemplate = function(root, folder) {
                var data = new FormData(document.getElementById(root + "_upload"));

                $.ajax({
                    url: baseUrl + "/" + root + "/" + encodeURIComponent(folder),
                    type: "POST",
                    headers: { "X-CustomersCanvasAPIKey": apiKey },
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(d) {
                        console.log("The " + d + " file was uploaded successfully.");
                    },
                    error: function() {
                        console.error("Upload failed.");
                    }
                })
            }
        });
    </script>


<?php
get_footer();
