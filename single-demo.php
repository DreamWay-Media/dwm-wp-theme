<?php
/* Template Name: Demo */ 

get_header();
?>
<section> 
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

    <h1 class="demo-title"><?php the_title(); ?></h1>

    <?php 
    $gallery = get_field('demo_gallery'); // Ensure this ACF field exists

    if ($gallery): ?>
    <div data-aos="fade-up">
        <div class="carousel-wrap">
            <div class="demo-wrap">
                <div id="demo-slider" class="owl-carousel">
                <?php foreach ($gallery as $image): ?>
                    <div>
                        <img class="demo-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

<?php
    endwhile;
endif;
?>
</section>

<?php
get_footer();
?>
<style>
    .demo-title {
        text-align: center;
    }
    #demo-slider {
        display: grid;
        grid-template-rows: 50px auto;
    }
    .demo-image {
        width: 100%;
        height: auto;
    }
    .demo-image:hover {
        cursor: grab;
    }
    .demo-image:active {
        cursor: grabbing;
    }
    .owl-nav .owl-prev {
        position: static;
    }
    .owl-nav .owl-next {
        position: static;
    }
    #demo-slider .owl-nav {
        all: initial;
        justify-self: center;
        align-self: center;
        grid-row: 1 / 2;
    }
    #demo-slider .owl-stage {
        grid-row: 2 / 3;
    }
</style>
