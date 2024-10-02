<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Dreamway_Media
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

        <header class="page-header">
            <h1 class="page-title">
                <?php
                /* translators: %s: search query. */
                printf( esc_html__( 'Search Results for: %s', 'dreamway-media' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
                ?>
            </h1>
        </header><!-- .page-header -->

        <?php
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            /* Output the search result using content-search.php template part */
            get_template_part( 'template-parts/content', 'search' );

        endwhile;

        /* Display navigation to next/previous set of posts */
        the_posts_navigation();

    else :

        /* Show a message when no search results are found */
        get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
