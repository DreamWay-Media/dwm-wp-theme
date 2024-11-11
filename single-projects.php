<?php
/**
 * The template for displaying all single project posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dreamway_Media
 */

get_header();
?>
<!-- Header Slider -->
<section class="header-slider-wrap inner-header-slider-wrap">
    <?php while ( have_posts() ) : the_post(); ?>
    <?php $post_id = get_the_ID(); ?>
    <?php $website_link = get_field('website_link', $post_id); ?>
    
    <!-- Slider -->
    <section class="portfolio-slider-wrap">
        <div class="container">
            <h1 id="project-title"><?php the_title(); ?></h1>
            <p>
                <?php
                $content = get_the_content();
                $excerpt = wp_trim_words( $content, 24, '...' );
                echo wp_kses_post( $excerpt );
                ?>
            </p>
            <div class="single-portfolio-list">
                <?php $terms = wp_get_post_terms( $post_id, 'project_category' ); ?>
                <?php foreach ( $terms as $term ) : ?>
                <span><?php echo esc_html( $term->name ); ?></span>
                <?php endforeach; ?>
            </div>
            <div class="button-portfolio">
                <a href="<?php echo esc_url( $website_link ); ?>" target="_blank">
                    Visit Website <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/arrow-portfolio.svg' ); ?>" alt="arrow">
                </a>
            </div>
        </div>
    </section>
    <!-- Slider -->
</section>
<!-- Header Slider -->

<!-- Content -->
<section class="content-main-wrap">
    <!-- Slider Image -->
    <div class="container">
        <div class="slider-image-wrap">
            <img src="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
        </div>
    </div>
    <!-- Slider Image -->

    <?php
    $info_headings = get_field('info_headings', $post_id);
    $info_gallery = get_field('info_gallery', $post_id);
    $info_complete_left_texts = get_field('info_complete_left_texts', $post_id);
    ?>

    <!-- What They Need -->
    <div class="what-they-need-wrap">
        <div class="container">
            <h3><?php echo esc_html( $info_headings ); ?></h3>
            <div class="product-slider-text">
                <div class="row">
                <?php if ( $info_gallery ): ?>
                <!-- Image -->
                <div class="col-md-6">
                    <div class="product-image-wrap">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php $counter = 1; ?>
                                <?php foreach ( $info_gallery as $image ): ?>
                                    <div class="carousel-item <?php echo ( $counter === 1 ) ? 'active' : ''; ?>">
                                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" title="<?php echo esc_attr( $image['title'] ); ?>">
                                    </div>
                                    <?php $counter++; ?>
                                <?php endforeach; ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Image -->
                <?php endif; ?>


                    <!-- Text -->
                    <div class="<?php echo $info_gallery ? 'col-md-6' : 'col-md-12'; ?>">
                        <div class="product-detail-text">
                            <?php echo wp_kses_post( $info_complete_left_texts ); ?>
                        </div>
                    </div>
                    <!-- Text -->
                </div>
            </div>
        </div>
    </div>
    <!-- What They Need -->

    <?php
    $second_section_heading = get_field('second_section_heading', $post_id);
    $second_section_description = get_field('second_section_description', $post_id);
    $second_section_images = get_field('second_section_images', $post_id);

    if ( $second_section_heading || $second_section_description ) :
    ?>
    <!-- Logo Design -->
    <section class="logo-design-wrap">
        <div class="container">
            <!-- Heading and Text -->
            <div class="logo-heading-text-wrap">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?php echo esc_html( $second_section_heading ); ?></h4>
                    </div>
                    <div class="col-md-6">
                        <p><?php echo wp_kses_post( $second_section_description ); ?></p>
                    </div>
                </div>
            </div>
            <!-- Logo Images -->
            <div class="logo-image-wrap">
                <ul class="row">
                    <?php if ( have_rows( 'second_section_images' ) ) : ?>
                        <?php while ( have_rows( 'second_section_images' ) ) : the_row(); ?>
                            <?php $image = get_sub_field( 'image' ); ?>
                            <li class="col-md-6">
                                <div class="logo-image-portfolio">
                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                                </div>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>
    <!-- Logo Design -->
    <?php endif; ?>

    <?php
    $third_section_heading = get_field('third_section_heading', $post_id);
    $third_section_description = get_field('third_section_description', $post_id);
    $third_section_button_text = get_field('third_section_button_text', $post_id);
    $third_section_button_link = get_field('third_section_button_link', $post_id);
    $third_section_image = get_field('third_section_image', $post_id);

    if ( $third_section_heading || $third_section_description ) :
    ?>
    <!-- Website Design & Development -->
    <section class="design-development-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="heading-text-wrap">
                        <h3><?php echo esc_html( $third_section_heading ); ?></h3>
                        <p><?php echo wp_kses_post( $third_section_description ); ?></p>
                        <?php if ( $third_section_button_link ) : ?>
                        <div class="btn-website-wrap">
                            <a href="<?php echo esc_url( $third_section_button_link ); ?>">
                                <?php echo esc_html( $third_section_button_text ); ?>
                                <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/arrow-website.svg' ); ?>" alt="arrow">
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php if ( $third_section_image ) : ?>
                    <div class="design-image-wrap">
                        <img src="<?php echo esc_url( $third_section_image['url'] ); ?>" alt="<?php echo esc_attr( $third_section_image['alt'] ); ?>">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Website Design & Development -->
    <?php endif; ?>

    <?php
    $video_heading = get_field('video_heading', $post_id);
    $video_description = get_field('video_description', $post_id);
    $intro_video_heading = get_field('intro_video_heading', $post_id);
    $videos = get_field('videos', $post_id);
    $brand_section_heading = get_field('brand_section_heading', $post_id);
    $brand_section_video_iframe = get_field('brand_section_video_iframe', $post_id);

    if ( $video_heading || $video_description ) :
    ?>
    <!-- Video Production -->
    <div class="video-production-wraper">
        <div class="container">
            <div class="video-production-wrap">
                <h3><?php echo esc_html( $video_heading ); ?></h3>
                <p><?php echo $video_description; ?></p>
            </div>
            <div class="project-video-wrap">
                <h5>Projects</h5>
                <h3><?php echo esc_html( $intro_video_heading ); ?></h3>
                <ul class="row">
                    <?php if ( have_rows( 'videos' ) ) : ?>
                        <?php while ( have_rows( 'videos' ) ) : the_row(); ?>
                        <li class="col-md-6">
                            <div class="listing-project-wrp">
                                <?php echo wp_kses_post( get_sub_field( 'video_ifram' ) ); ?>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="brand-video-wraper">
                <h3><?php echo esc_html( $brand_section_heading ); ?></h3>
                <div class="big-video-image">
                    <?php echo wp_kses_post( $brand_section_video_iframe ); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Production -->
    <?php endif; ?>

    <?php
    $product_heading = get_field('product_heading', $post_id);
    $product_description = get_field('product_description', $post_id);

    if ( $product_heading || $product_description ) :
    ?>
    <!-- Product Design -->
    <div class="product-design-wraper">
        <div class="container">
            <h4><?php echo esc_html( $product_heading ); ?></h4>
            <p><?php echo esc_html( $product_description ); ?></p>
            <ul class="row">
                <?php if ( have_rows( 'products_images' ) ) : ?>
                    <?php while ( have_rows( 'products_images' ) ) : the_row(); ?>
                    <?php $image = get_sub_field( 'image' ); ?>
                    <li class="col-md-4">
                        <div class="listing-design-wrap">
                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                        </div>
                    </li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <!-- Product Design -->
    <?php endif; ?>

    <?php
    $cta_heading = get_field('cta_heading', $post_id);
    $cta_button_text = get_field('cta_button_text', $post_id);
    $cta_button_link = get_field('cta_button_link', $post_id);
    ?>
    <!-- Call to Action -->
    <div class="cta-main-wraper">
        <div class="container">
            <h2 data-aos="fade-up" class="aos-init aos-animate"><?php echo wp_kses_post( $cta_heading ); ?></h2>
            <div class="btn-cta-wrap aos-init aos-animate" data-aos="fade-up">
                <a href="<?php echo esc_url( $cta_button_link ); ?>" class="startNowBtn"><?php echo esc_html( $cta_button_text ); ?></a>
            </div>
        </div>
    </div>
    <!-- Call to Action -->
</section>
<!-- Content -->

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>