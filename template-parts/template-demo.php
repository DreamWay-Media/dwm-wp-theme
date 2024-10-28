<?php
/* Template Name: Demo */ 

get_header();
?>
<section> 
<?php
// Start the Loop
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

    <h1><?php the_title(); ?></h1>

    <?php 
    // Get the ACF Gallery Field
    $gallery = get_field('demo_gallery'); // Replace 'demo' with your ACF field name

    if ( $gallery ) : ?>
        <div class="owl-carousel">
            <?php foreach ( $gallery as $image ) : ?>
                <div class="item">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

<?php
    endwhile;
endif;
?>
<h2>TEST</h2>
</section>

<?php
    get_footer();
?>