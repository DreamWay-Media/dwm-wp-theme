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
        <div class="container row-container">
            <div class="content-container">
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
            </div>

            <?php 
            $logo = get_field('header_logo'); // Fetch the field value for the current post
            $logo_alt = get_field('logo_alt_text');

            if ($logo): ?>
                <div class="logo-container">
                    <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo_alt ?: 'Logo'); ?>" class="logo">
                </div>
            <?php endif; ?>
        </div>
    </section>
</section>

<!-- Header Slider -->

<!-- Content -->
<section class="content-main-wrap">
    <!-- Slider Image -->
    <div class="container">
        <div class="slider-image-wrap">
            <?php 
            $slider_image = get_field('slider_image', $post_id); // Fetch the custom field value
            if ( $slider_image ) : 
            ?>
                <img src="<?php echo esc_url( $slider_image['url'] ); ?>" alt="<?php echo esc_attr( $slider_image['alt'] ?: get_the_title() ); ?>">
            <?php else : ?>
                <!-- Fallback to post thumbnail if custom field is empty -->
                <img src="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
            <?php endif; ?>
        </div>
    </div>
    <!-- Slider Image -->
    <?php
    $info_headings = get_field('info_headings', $post_id);
    $info_gallery = get_field('info_gallery', $post_id);
    $first_section_title = get_field('first_section_title', $post_id);
    $info_complete_left_texts = get_field('info_complete_left_texts', $post_id);
    ?>

    <!-- First Section -->
    <div class="what-they-need-wrap">
        <div class="container">
            <h3><?php echo esc_html( $info_headings ); ?></h3>
            <div class="product-slider-text">
                <div class="row">
                <?php if ( $info_gallery ): ?>
                <!-- Title -->
                <div class="col-md-5">
                    <h2 class="project-title"><?php echo esc_html( $first_section_title ); ?></h2>
                </div>
                <!-- Title -->
                <?php endif; ?>


                    <!-- Text -->
                    <div class="<?php echo $first_section_title ? 'col-md-7' : 'col-md-12'; ?>">
                        <div class="<?php echo $first_section_title ? 'product-detail-padding' : ''; ?> product-detail-text">
                            <?php echo wp_kses_post( $info_complete_left_texts ); ?>
                        </div>
                    </div>
                    <!-- Text -->
                </div>
            </div>
        </div>
    </div>
    <!-- First Section -->

    <?php
    $second_section_heading = get_field('second_section_heading', $post_id);
    $second_section_title = get_field('second_section_title', $post_id);
    $second_section_description = get_field('second_section_description', $post_id);
    $second_section_images = get_field('second_section_images', $post_id);

    if ( $second_section_heading || $second_section_description ) :
    ?>
    <!-- Second Section -->
    <div class="what-they-need-wrap">
        <div class="container">
            <h3 id="second-heading"><?php echo esc_html( $second_section_heading ); ?></h3>
            <div class="second-product-slider-text">
                <div class="row">
                <!-- Title -->
                <div class="col-md-5">
                    <h2 class="project-title"><?php echo esc_html( $second_section_title ); ?></h2>
                    <div class="see-more-btn aos-init aos-animate portfolio-btn" data-aos="fade-up">
                        <a href="<?php echo esc_url( $website_link ); ?>" target="_blank">
                            Visit Website
                        </a>
                    </div>
                </div>
                <!-- Title -->



                    <!-- Text -->
                    <div class="<?php echo $first_section_title ? 'col-md-7 second-description-text' : 'col-md-12'; ?>">
                        <div class="<?php echo $first_section_title ? 'product-detail-padding' : ''; ?> product-detail-text">
                            <?php echo wp_kses_post( $second_section_description ); ?>
                        </div>
                    </div>
                    <!-- Text -->
                </div>
            </div>
                <!-- Images Section -->
                <?php if ( have_rows('second_section_images', $post_id) ): ?>
        <div class="second-section-images">
                <?php while ( have_rows('second_section_images', $post_id) ): the_row(); ?>
                    <?php
                    $image = get_sub_field('image'); // Assuming the subfield is called 'image'
                    $image_url = isset($image['url']) ? $image['url'] : '';
                    $image_alt = isset($image['alt']) ? $image['alt'] : 'Image';
                    ?>
                    <?php if ( $image_url ): ?>
                        
                        <div class="grid-item">
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                        </div>

                    <?php endif; ?>
                <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <!-- Images Section -->
    </div>
</div>
<!-- Second Section -->
<?php endif; ?>
<?php
// Third Section Variables
$third_section_heading = get_field('third_section_heading', $post_id);
$third_section_title = get_field('third_section_title', $post_id);
$third_section_description = get_field('third_section_description', $post_id);
$third_section_images = get_field('third_section_images', $post_id);

// Third Section Output
if ( $third_section_heading || $third_section_description ) :
?>
<!-- Third Section -->
<div class="what-they-need-wrap">
    <div class="container">
        <h3 id="third-heading"><?php echo esc_html( $third_section_heading ); ?></h3>
        <div class="second-product-slider-text">
            <div class="row">
                <!-- Title -->
                <div class="col-md-5">
                    <h2 class="project-title"><?php echo esc_html( $third_section_title ); ?></h2>
                    <!-- Button omitted -->
                </div>
                <!-- Title -->

                <!-- Text -->
                <div class="<?php echo $first_section_title ? 'col-md-7 second-description-text' : 'col-md-12'; ?>">
                    <div class="<?php echo $first_section_title ? 'product-detail-padding' : ''; ?> product-detail-text">
                        <?php echo wp_kses_post( $third_section_description ); ?>
                    </div>
                </div>
                <!-- Text -->
            </div>
        </div>
        <!-- Images Section -->
        <?php if ( have_rows('third_section_images', $post_id) ): ?>
        <div class="third-section-images">
            <?php while ( have_rows('third_section_images', $post_id) ): the_row(); ?>
                <?php
                $image = get_sub_field('image');
                $image_url = isset($image['url']) ? $image['url'] : '';
                $image_alt = isset($image['alt']) ? $image['alt'] : 'Image';
                ?>
                <?php if ( $image_url ): ?>
                    <div class="grid-item">
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <!-- Images Section -->
    </div>
</div>
<!-- Third Section -->
<?php endif; ?>

<?php
// Fourth Section Variables
$fourth_section_heading = get_field('fourth_section_heading', $post_id);
$fourth_section_title = get_field('fourth_section_title', $post_id);
$fourth_section_description = get_field('fourth_section_description', $post_id);
$fourth_section_images = get_field('fourth_section_images', $post_id);

// Fourth Section Output
if ( $fourth_section_heading || $fourth_section_description ) :
?>
<!-- Fourth Section -->
<div class="what-they-need-wrap">
    <div class="container">
        <h3 id="fourth-heading"><?php echo esc_html( $fourth_section_heading ); ?></h3>
        <div class="second-product-slider-text">
            <div class="row">
                <!-- Title -->
                <div class="col-md-5">
                    <h2 class="project-title"><?php echo esc_html( $fourth_section_title ); ?></h2>
                    <!-- Button omitted -->
                </div>
                <!-- Title -->

                <!-- Text -->
                <div class="<?php echo $first_section_title ? 'col-md-7 second-description-text' : 'col-md-12'; ?>">
                    <div class="<?php echo $first_section_title ? 'product-detail-padding' : ''; ?> product-detail-text">
                        <?php echo wp_kses_post( $fourth_section_description ); ?>
                    </div>
                </div>
                <!-- Text -->
            </div>
        </div>
        <!-- Images Section -->
        <?php if ( have_rows('fourth_section_images', $post_id) ): ?>
        <div class="fourth-section-images">
            <?php while ( have_rows('fourth_section_images', $post_id) ): the_row(); ?>
                <?php
                $image = get_sub_field('image');
                $image_url = isset($image['url']) ? $image['url'] : '';
                $image_alt = isset($image['alt']) ? $image['alt'] : 'Image';
                ?>
                <?php if ( $image_url ): ?>
                    <div class="grid-item">
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <!-- Images Section -->
    </div>
</div>
<!-- Fourth Section -->
<?php endif; ?>

<?php
// Result Section Variables
$result_heading = get_field('result_heading', $post_id);
$result_title = get_field('result_title', $post_id);
$result_description = get_field('result_description', $post_id);

// Result Section Output
if ($result_heading || $result_description) :
?>
<!-- Result Section -->
<div class="result-section-wrap">
    <div class="container">
        <div>
            <div class="row">
                <!-- Title -->
                <h3 class="result-heading"><?php echo esc_html( $result_heading ); ?></h3>
                <div class="col-md-6">
                    
                    <h2 class="result-title"><?php echo esc_html( $result_title ); ?></h2>
                    <!-- Button omitted -->
                </div>
                <!-- Title -->
                <?php endif; ?>

                <!-- Text -->
                <div class="col-md-6 result-description">
                    <div class="<?php echo $first_section_title ? 'product-detail-padding' : ''; ?> product-detail-text">
                        <?php echo wp_kses_post( $result_description ); ?>
                    </div>
                </div>
                <!-- Text -->
            </div>
        </div>
    </div>
</div>
<!--content-->
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
</section>
<!-- Content -->

<?php endwhile; // End of the loop. ?>
<!-- Result Section -->
 <!--content-->
<section class="content-main-wrap"> 
  <!--portfolio listing-->
  <section class="portfolio-listing-wrap">
    <div class="container">
      <ul class="row projects_ul single_ul">
        <?php 
        $current_post_id = get_the_ID(); // Get the current post ID
        $categories = wp_get_post_terms($current_post_id, 'project_category', array('fields' => 'ids')); // Get categories of current post
        $args = array(
          'posts_per_page' => 3, // Show 3 related projects
          'orderby'        => 'rand', // Random order
          'post_type'      => 'projects',
          'post_status'    => 'publish',
          'post__not_in'   => array($current_post_id), // Exclude current post
          'tax_query'      => array( // Filter by category
            array(
              'taxonomy' => 'project_category',
              'field'    => 'term_id',
              'terms'    => $categories,
            ),
          ),
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
          $counter = 1;
          while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $terms = wp_get_post_terms($post_id, 'project_category');
            $categories = array();

            foreach ($terms as $term) {
              $name = esc_html( $term->name );
              $un_name = esc_attr( str_replace(' ', '_', $name) );
              $categories[] = $un_name;
            }

            $categories_string = esc_attr( implode(' ', $categories) );
            $thumbnail_url = esc_url( wp_get_attachment_url(get_post_thumbnail_id($post_id)) );
            ?>
            <li class="col-md-4" data-categories="<?php echo $categories_string; ?>">
              <div class="listing-featured-wrap">
              <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                <div class="listing-featured-wrap-image" style="background: url(<?php echo $thumbnail_url; ?>) no-repeat top;"></div></a>
                <div class="listing-featured-text">
                 <h3><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></h3>
                  <p class="single-paragraph">
                    <?php
                    $content = wp_strip_all_tags( get_the_content() );
                    $excerpt = wp_trim_words($content, 24, '...');
                    echo esc_html( $excerpt );
                    ?>
                  </p>
                  <div class="tag-featured-wrap">
                    <?php foreach ($terms as $term) : ?>
                      <span><?php echo esc_html( $term->name ); ?></span>
                    <?php endforeach; ?>
                  </div>
               </div>
              </div>
            </li>
            <?php
            $counter++;
          }
        } else {
          echo '<h1 class="page-title screen-reader-text">' . esc_html__( 'No Posts Found', 'dreamway-media' ) . '</h1>';
        }

        wp_reset_postdata();
        ?>
      </ul>
    </div>
  </section>
  <!--portfolio listing--> 
</section>


<?php get_footer(); ?>