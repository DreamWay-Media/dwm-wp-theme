<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Dreamway_Media
 */

get_header();
?>

<main id="primary" class="site-main" style="min-height: 80vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <section class="error-404 not-found" style="text-align: center; max-width: 600px; width: 100%;">
        
        <header class="page-header" style="margin-bottom: 20px;">
            <h1 class="page-title" style="font-size: 3rem; color: #333;">Oops! Page Not Found</h1>
            <p style="font-size: 1.2rem; color: #777;">We couldn’t find the page you were looking for.</p>
        </header><!-- .page-header -->

        <div class="page-content" style="margin-top: 20px;">
            <p style="font-size: 1rem; color: #555;">But don't worry! Let's get you back on track.</p>
            
            <a href="<?php echo esc_url(home_url('/')); ?>" class="button" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #c8f031; color: black; text-decoration: none; border-radius: 5px; font-weight: bold;">Return to Homepage</a>
            
            <div class="helpful-links" style="margin-top: 40px;">
                <h2 style="font-size: 1.5rem; color: #333;">Here are some helpful links:</h2>
                <ul style="list-style-type: none; padding: 0; margin-top: 20px;">
                    <li><a href="<?php echo esc_url(home_url('/about')); ?>" style="color: #007acc; text-decoration: none; padding: 5px 0; display: inline-block;">About Us</a></li>
                    <li><a href="<?php echo esc_url(home_url('/services')); ?>" style="color: #007acc; text-decoration: none; padding: 5px 0; display: inline-block;">Our Services</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>" style="color: #007acc; text-decoration: none; padding: 5px 0; display: inline-block;">Contact Us</a></li>
                    <li><a href="<?php echo esc_url(home_url('/portfolio')); ?>" style="color: #007acc; text-decoration: none; padding: 5px 0; display: inline-block;">Portfolio</a></li>
                    <li><a href="<?php echo esc_url(home_url('/blog')); ?>" style="color: #007acc; text-decoration: none; padding: 5px 0; display: inline-block;">Blog</a></li>
                </ul>
            </div>
        </div><!-- .page-content -->

    </section><!-- .error-404 -->
</main><!-- #main -->

<?php
get_footer();
?>
