<?php
/* Template Name: Demo */ 

get_header();
?>
<section> 
    <div data-aos="fade-up">
        <div class="carousel-wrap">
            <div class="demo-wrap">
            <div id="demo-slider" class="owl-carousel">
                <?php 
                    $args = array(
                        'post_type' => 'demo',
                        'posts_per_page' => -1,
                        'meta_key' => 'demo_id',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC'
                    );
                    $demos = new WP_Query($args);
                    if ($demos->have_posts()) : 
                        while ($demos->have_posts()) : $demos->the_post(); 
                            $image = get_field('demo_image');
                ?>
                <div>
                    <img class="demo-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>">
                </div>
                <?php 
                        endwhile; 
                        wp_reset_postdata(); 
                    endif; 
                ?>
            </div>
            </div>
        </div>
    </div>
    <style>
        #demo-slider {
            display: grid;
            grid-template-rows: 50px auto;
        }
        .demo-image {
            width: 100vw;
            height: auto;
        }
        .owl-nav .owl-prev{
            position: static;
        }
        .owl-nav .owl-next{
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
</section>

<?php
    get_footer();
?>