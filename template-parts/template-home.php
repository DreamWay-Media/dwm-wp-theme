<?php 
/* Template Name: Home Template */ 

get_header();
?>

<section class="header-slider-wrap homepage-slider-wrap"> 
  <?php 
  // Fetching banner fields for text content
  $banner_heading = get_field('banner_heading');
  $banner_description = get_field('banner_description');
  $banner_button_text = get_field('banner_button_text');
  $banner_button_link = get_field('banner_button_link');
  ?>
  
  <!--slider-->
  <section class="slider-main-wrap homepage-hero">
    <div class="container home-container">
      <div class="row header-row">
        <!--Text on the left side-->
        <div class="col-md-6 header-section">
          <div class="slider-text-wrap" data-aos="fade-up">
            <h1><?php echo wp_kses_post($banner_heading); ?></h1>
            <p><?php echo wp_kses_post($banner_description); ?></p>
            <?php if ($banner_button_text && $banner_button_link) : ?>
            <div class="slider-text-btn">
              <a href="<?php echo esc_url($banner_button_link); ?>" class="btn"><?php echo esc_html($banner_button_text); ?></a>
            </div>
            <?php endif; ?>
          </div>
        </div>
        
        <!--Slider on the right side-->
        <div class="col-md-6 hero-carousel">
          <div id="hero-slider" class="owl-carousel owl-theme" data-aos="fade-up">
            <?php
            $args = array(
                'post_type'      => 'hero_slides',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            );
            $slides = new WP_Query( $args );

            if ( $slides->have_posts() ) :
                while ( $slides->have_posts() ) : $slides->the_post();
                    $slide_image = get_field('slide_image');
                    $slide_heading = get_field('slide_heading');
                    $slide_description = get_field('slide_description');
                    $button_text = get_field('button_text');
                    $button_link = get_field('button_link');
            ?>
                    <div class="slide-item">
                        <img src="<?php echo esc_url($slide_image['url']); ?>" alt="<?php echo esc_attr($slide_image['alt']); ?>" />
                        <div class="slide-content">
                            <h3><?php echo esc_html($slide_heading); ?></h3>
                            <p><?php echo esc_html($slide_description); ?></p>
                            <?php if ( $button_text && $button_link ) : ?>
                                <a href="<?php echo esc_url($button_link); ?>" class="slider-button"><?php echo esc_html($button_text); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
          </div>
        </div>
        <!--Slider End-->
        <!--scroll down-->
        <div class="scroll-down-btn" data-aos="fade-up"> <a href="#about-main-wrap"> <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/circle.svg" alt="circle"></a> 
        </div>
        <!--scroll down--> 
      </div>
    </div>
  </section>
  <!--slider--> 
  
</section>

<!-- Rest of your sections remain unchanged -->
<!--header slider--> 
<section class="about-main-wrap" id="about-main-wrap"> 
  
  <!--about-->
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <div class="container bootstrap snippets bootdey home-container" data-aos="fade-up">
<!-- Services Section -->
<section id="services" class="current">
    <div class="services-top">
        <div class="container bootstrap snippets bootdey home-container">
            <div class="row text-center">
                <div class="col-12">
                    <h2>Your Local & Friendly</h2>
                    <h2 class="highlighted-heading">Web Marketing Agency</h2>
                    <p>We offer a wide range of services to ensure you get what you need, all under one roof.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="services-list">
                        <div class="row">
                            <?php
                            // Query the 'services' custom post type
                            $args = array(
                                'post_type' => 'services',
                                'posts_per_page' => -1,  // Fetch all services
                                'order' => 'ASC',
                                'orderby' => 'menu_order',
                            );
                            $services_query = new WP_Query($args);

                            if ($services_query->have_posts()) :
                                while ($services_query->have_posts()) : $services_query->the_post();
                                    // Get custom fields
                                    $service_icon = get_field('service_icon'); // Icon class
                                    $service_info = get_field('service_info'); // Short info
                                    $service_link = get_field('service_link'); // Custom link

                                    // Fallbacks if fields are empty
                                    if (!$service_icon) {
                                        $service_icon = 'fa fa-star'; // Default icon
                                    }
                                    if (!$service_info) {
                                        $service_info = get_the_excerpt();
                                    }
                                    ?>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="service-block" style="visibility: visible;">
                                            <div class="ico <?php echo esc_attr($service_icon); ?> highlight"></div>
                                            <div class="text-block">
                                                <?php if ($service_link) : ?>
                                                    <a class="no-style-link" href="<?php echo esc_url($service_link); ?>">
                                                        <div class="name"><?php the_title(); ?></div>
                                                    </a>
                                                <?php else : ?>
                                                    <div class="name"><?php the_title(); ?></div>
                                                <?php endif; ?>
                                                <div class="info"><?php echo esc_html($service_info); ?></div>
                                                <!-- Sub-Services List -->
                                                <?php
                                                // Initialize an array to hold sub-services
                                                $sub_services = array();

                                                if (have_rows('sub_service')) {
                                                    while (have_rows('sub_service')) {
                                                        the_row();
                                                        $sub_service_name = get_sub_field('service');
                                                        if ($sub_service_name) {
                                                            $sub_services[] = $sub_service_name;
                                                        }
                                                    }
                                                }

                                                // Now, join the sub-services with commas and output
                                                if (!empty($sub_services)) {
                                                    echo '<div class="text">' . esc_html(implode(', ', $sub_services)) . '</div>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<p>No services found.</p>';
                            endif;
                            ?>
                        </div>
                        <div class="see-more-btn" data-aos="fade-up">
                            <a href="/services/">Learn more about our services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Services Section -->



  </div>  
</section>

<!--CSS-->
<style>                 
#services .services-top {
    padding: 70px 0 50px;
}
#services .services-list {
    padding-top: 50px;
}
.services-list .service-block {
    margin-bottom: 25px;
}
.services-list .service-block .ico {
    font-size: 38px;
    float: left;
}
.services-list .service-block .text-block {
    margin-left: 58px;
}
.services-list .service-block .text-block .name {
    font-size: 20px;
    font-weight: 900;
    margin-bottom: 5px;
}
.services-list .service-block .text-block .info {
    font-size: 16px;
    font-weight: 300;
    margin-bottom: 10px;
}
.services-list .service-block .text-block .text {
    font-size: 12px;
    line-height: normal;
    font-weight: 300;
}
.highlight {
    color: #a0ca00;
    font-weight:bold;
}
</style>
<!--about section--> 
<?php
// Checking if ACF is active and fields exist
if( function_exists('get_field') ):  
    // Stored fields in variables
    $achievement_heading = get_field('achievement_heading');
    $shopify_title = get_field('shopify_title');
    $shopify_logo = get_field('shopify_logo');
    $reach_us_button_text = get_field('reach_us_button_text');
    $reach_us_button_link = get_field('reach_us_button_link');
?>
<section class="achievements-main-wrap py-5">
    <div class="container">
        <!-- Achievement Heading -->
        <?php if( $achievement_heading ): ?>
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h3><?php echo $achievement_heading; ?></h3>
                </div>
            </div>
        <?php endif; ?>
        <!-- Achievements Repeater -->
        <?php if( have_rows('achievements') ): ?>
            <div class="row justify-content-center mb-5 g-1">
                <?php 
                while( have_rows('achievements') ): the_row();
                    $achievement_icon = get_sub_field('achievement_icon');
                    $achievement_text = get_sub_field('achievement_text');
                ?>
                    <div class="col-md-3 col-sm-6 text-center mb-4">
                        <?php if($achievement_icon): ?>
                            <div class="achievement-icon mb-3">
                                <img src="<?php echo esc_url($achievement_icon['url']); ?>" 
                                     alt="<?php echo esc_attr($achievement_text); ?>"
                                     class="img-fluid">
                            </div>
                        <?php endif; ?>
                        <?php if($achievement_text): ?>
                            <div class="achievement-text">
                                <p class="text-white text-center mb-0 achievement-text-color"><?php echo wp_kses_post($achievement_text); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <!-- Shopify Partner Section -->
        <?php if( $shopify_title ): ?>
            <div class=" row justify-content-center">
                <div class="shopify-title col-12 text-center mb-4">
                    <h3 class="text-white"><?php echo $shopify_title; ?></h3>
                </div>
            </div>
        <?php endif; ?>

        <?php if( $shopify_logo ): ?>
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <img src="<?php echo esc_url($shopify_logo['url']); ?>" 
                         alt="Shopify Partner"
                         class="img-fluid shopify-logo">
                </div>
            </div>
            <div class="reach-us-btn" data-aos="fade-up">
              <a href="<?php echo esc_url($reach_us_button_link); ?>" class="btn"><?php echo esc_html($reach_us_button_text); ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<!--content-->
<section class="content-main-wrap"> 
  <?php $info_heading = get_field('info_heading'); ?>
  
  <!--numbers-->
  <div class="site-number-main-wrap">
    <div class="container home-container">
      <h3 data-aos="fade-up" data-aos-anchor-placement="top-bottom"><?php echo wp_kses_post($info_heading); ?></h3>
      <ul class="row" data-aos="zoom-in-right">
        <?php if (have_rows('info_features')) : 
          while (have_rows('info_features')) : the_row();
            $features_count = get_sub_field('features_count');
            $feature_text = get_sub_field('feature_text');
            ?>
            <li class="col-md-3">
              <div class="number-list-wrap">
                <strong><?php echo esc_html($features_count); ?></strong>
                <h5><?php echo esc_html($feature_text); ?></h5>
              </div>
            </li>
          <?php endwhile; 
          wp_reset_postdata();
        endif; ?>
      </ul>
    </div>
        <!--logo-scroll--> 
<div class="logo-scroll-container">
  <div class="logo-scroll">
    <div class="logos-slide">
        <?php
        $logos = new WP_Query(array(
            'post_type' => 'partner_logo',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        ));
        $logo_items = array();
        if ($logos->have_posts()) :
          while ($logos->have_posts()) : $logos->the_post();
              if (has_post_thumbnail()) :
                 ob_start();
                  ?>
                  <div class="logo-item">
                  <?php the_post_thumbnail('full', array(
                        'alt' => get_the_title(),
                        'loading' => 'lazy'
                    )); ?>
                  </div>
                  <?php
                $logo_items[] = ob_get_clean();
              endif;
          endwhile;
      endif;
      wp_reset_postdata();
      echo implode('', $logo_items);
      echo implode('', $logo_items);

        ?>
    </div>
</div>
</div> 
<!-- logo-scroll-->
  </div>
  <!--numbers--> 
   <!-- case study-->
<div class="case-study-wrap">
<div class="container home-container"> 
<?php
$title = get_field('cs_title');
$paragraph = get_field('cs_paragraph');
$paragraph1 = get_field('cs_paragraph1');
$image = get_field('cs_image');
$button_text = get_field('cs_buttontext');
$button_link = get_field('cs_buttonlink');
?>
<div class="row case-study-row align-items-center">
    <!-- Left Column: Title, Paragraph, and Button -->
    <div class="col-md-6 d-flex flex-column align-items-center text-center">
        <!-- Section Heading -->
        <?php if( $title ): ?>
            <h2 class="highlighted-heading" data-aos="fade-up">
                <?php echo esc_html($title); ?>
            </h2>
        <?php endif; ?>

        <!-- Paragraph Section -->
        <?php if( $paragraph ): ?>
            <p data-aos="fade-up">
                <?php echo esc_html($paragraph); ?>
            </p>
        <?php endif; ?>
        <?php if( $paragraph1 ): ?>
            <p data-aos="fade-up">
                <?php echo esc_html($paragraph1); ?>
            </p>
        <?php endif; ?>

        <!-- Button Section -->
        <?php if( $button_text && $button_link ): ?>
            <div class="see-more-btn" data-aos="fade-up">
                <a href="<?php echo esc_url($button_link); ?>">
                    <?php echo esc_html($button_text); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
 <!-- Right Column: Image -->
    <div class="col-md-6 text-center">
        <?php if( $image ): ?>
            <img src="<?php echo esc_url($image['url']); ?>" 
                 alt="<?php echo esc_attr($image['alt']); ?>" 
                 class="img-case-study" data-aos="fade-up">
        <?php endif; ?>
    </div>
 </div>
</div>
</div>
 <!-- case study-->

  <!--Our Featured Projects-->
  <?php 
  $project_heading = get_field('project_heading');
  $project_description = get_field('project_description');
  $project_button_text = get_field('project_button_text');
  $project_button_link = get_field('project_button_link');
  ?>
  
  <div class="featured-main-wraper">
    <div class="container home-container"> 
      <!--heading-->
      <div class="featured-heading-wrap">
        <div class="row">
          <div class="col-md-6">
            <h2 data-aos="fade-up"><?php echo wp_kses_post($project_heading); ?></h2>
          </div>
          <div class="col-md-6">
            <p data-aos="fade-left"><?php echo wp_kses_post($project_description); ?></p>
          </div>
        </div>
      </div>
      
      <!--listing-->
      <div class="featured-listing-wrap">
  <ul class="row">
    <?php 
    $args = array(
      'posts_per_page' => 3,
      'order'          => 'DESC',
      'post_type'      => 'projects',
      'post_status'    => 'publish'
    );
    $query = new WP_Query($args);

          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); 
              $thumbnail_url = esc_url(wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())));
              ?>
              <li class="col-md-4">
                <div class="listing-featured-wrap" data-aos="fade-up">
                <a href="<?php echo esc_url(get_the_permalink()); ?>">
                  <div class="listing-featured-wrap-image home-featured" style="background: url(<?php echo $thumbnail_url; ?>) no-repeat top;"></div></a>
                  <div class="listing-featured-text">
                   <h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3>
                    <p>
                      <?php
                      $excerpt = wp_trim_words(get_the_content(), 24, '...');
                      echo esc_html($excerpt);
                      ?>
                    </p>
                    <div class="tag-featured-wrap">
                      <?php 
                      $terms = wp_get_post_terms(get_the_ID(), array('project_category'));
                   
                      foreach ($terms as $term) : ?>
                        <span><?php echo esc_html($term->name); ?></span>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </li>
            <?php endwhile; 
          else : ?>
            <h1 class="page-title screen-reader-text"><?php esc_html_e('No Posts Found', 'dreamway-media'); ?></h1>
          <?php endif;
          wp_reset_postdata(); ?>
        </ul>
      </div>
      
      <div class="visit-portfolio-btn" data-aos="fade-up">
        <a href="<?php echo esc_url($project_button_link); ?>"><?php echo esc_html($project_button_text); ?></a>
      </div>
    </div>
  </div>
  <!--Our Featured Projects--> 

  <!--Our Featured Blog Posts-->
  <?php
  $args = array(
      'post_type' => 'post',
      'posts_per_page' => -1, 
  );
  $query = new WP_Query($args);

  // Gather field group for Featured Section
  $featured_blog_title = get_field('featured_blog_title');
  $featured_blog_description = get_field('featured_blog_description');
  $featured_blog_button_text = get_field('featured_blog_button_text');
  ?>

  <div class="featured-blog-wrap">
    <div class="container home-container">
      <div class="featured-blog-heading-wrap">
      <div class="row">
        <div data-aos="fade-up" class="col-md-6"><h2><?php echo esc_html($featured_blog_title); ?></h2></div>
        <div data-aos="fade-left" class="col-md-6 mt-5 mt-md-0"><p><?php echo esc_html($featured_blog_description) ?></p></div>
      </div>
      </div>
      <ul class="row">
      <?php $count = 0;  ?>
      <?php if ($query->have_posts()) : ?>
          <?php while ($query->have_posts()) : $query->the_post(); ?>
              <?php
              // Gather field group for featured posts
              $featured = get_field('is_featured_blog');
              if ($featured && $count < 3) : // Change $count number as needed ?>
                  <?php $count++; ?>
                  <li class="mb-5 mb-md-0 featured-blog-item col-md-4">
                    <div class="featured-blog" data-aos="fade-up">
                      <a href="<?php echo esc_url(get_the_permalink()); ?>">
                        <div class="featured-blog-image" style="background: url(<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id($post->ID))); ?>) no-repeat top;"></div>
                      </a>
                      <div class="featured-blog-text">
                        <h3 class="featured-blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p>
                          <?php
                          $content = strip_tags(get_the_content());
                          $words = explode(' ', $content);
                          $excerpt = implode(' ', array_slice($words, 0, 15));
                          if (count($words) > 15) {
                              $excerpt .= '<br><a class="read-more-btn" href="' . esc_url(get_permalink()) . '">Read More <i class=\'fa fa-angle-right\'></i></a>';
                          }
                          echo $excerpt;
                          ?>
                        </p>
                      </div>
                    </div>
                  </li>
              <?php endif; ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
      <?php else : ?>
          <p>No posts found.</p>
      <?php endif; ?>
      </ul>
      <div class="see-more-btn" data-aos="fade-up">
        <a href="/blog/"><?php echo esc_html($featured_blog_button_text); ?></a>
      </div>
    </div>
  </div>
  <!--Our Featured Blog Posts-->

  <!--Testimonials Section-->
  <?php $testimonial_heading = get_field('testimonial_heading'); ?>
  
  <section class="client-main-review-wrap"> 
    <div class="client-heading-wrap">
      <div class="container home-container">
        <div class="row">
          <div class="col-md-12">
            <h2 data-aos="fade-up"><?php echo wp_kses_post($testimonial_heading); ?></h2>
          </div>
        </div>
      </div>
    </div>
    
    <div class="clients-slider-wrap" data-aos="fade-up">
      <div class="carousel-wrap">
        <div id='testimonial-slider' class="owl-carousel">
          <?php if (have_rows('testimonials')) : 
            while (have_rows('testimonials')) : the_row();
              $customer_name = get_sub_field('customer_name');
              $customer_designation = get_sub_field('customer_designation');
              $customer_image = get_sub_field('customer_image');
              $customer_message = get_sub_field('customer_message');
              ?>
              <div class="item">
                <div class="listing-client-wrap">
                  <p><?php echo wp_kses_post($customer_message); ?></p>
                  <div class="client-name-image">
                    <div class="client-image" style="background: url(<?php echo esc_url($customer_image['url']); ?>) no-repeat top;"></div>
                    <div class="client-name">
                      <h5><?php echo esc_html($customer_name); ?></h5>
                      <span><?php echo esc_html($customer_designation); ?></span>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; 
          endif; ?>
        </div>
      </div>
    </div>
    
  </section>
  <!--Testimonials Section--> 

</section>
<!--content--> 

<?php
get_footer();