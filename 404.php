<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Dreamway_Media
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="error-404 not-found">
        
        <header class="page-header">
            <h1 class="page-title">Oops! We couldn't find that page.</h1>
            <p>It looks like nothing was found at this location.</p>
        </header><!-- .page-header -->

        <div class="page-content">
            <p><?php esc_html_e( 'Try searching below to find what you need!', 'dreamway-media' ); ?></p>
            <?php get_search_form(); ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="button">Return to Homepage</a>
        </div><!-- .page-content -->

    </section><!-- .error-404 -->
</main><!-- #main -->

<?php
get_footer();
?>
