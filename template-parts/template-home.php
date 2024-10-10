<?php 
/* Template Name: Home Template */ 

get_header();
?>

<section class="header-slider-wrap"> 
  <?php 
  $banner_heading = get_field('banner_heading');
  $banner_description = get_field('banner_description');
  $banner_image = get_field('banner_image');
  $banner_button_text = get_field('banner_button_text');
  $banner_button_link = get_field('banner_button_link');
  ?>
  
  <!--slider-->
  <section class="slider-main-wrap">
    <div class="container">
      <div class="row">
        <div class="mobile-slider-image" data-aos="fade-up">
          <img src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr($banner_image['alt']); ?>" title="<?php echo esc_attr($banner_image['alt']); ?>">
        </div>
        
        <!--text-->
        <div class="col-md-5">
          <div class="slider-text-wrap">
            <h1 data-aos="fade-up"><?php echo wp_kses_post($banner_heading); ?></h1>
            <p data-aos="fade-up"><?php echo wp_kses_post($banner_description); ?></p>
            <div class="slider-text-btn" data-aos="fade-up">
              <a href="<?php echo esc_url($banner_button_link); ?>"><?php echo esc_html($banner_button_text); ?></a>
            </div>
          </div>
        </div>
        <!--text--> 
        
        <!--image-->
        <div class="col-md-7">
          <div class="slider-image" data-aos="fade-up">
            <img src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr($banner_image['alt']); ?>" title="<?php echo esc_attr($banner_image['alt']); ?>">
          </div>
        </div>
        <!--image--> 
      </div>
    </div>
  </section>
  <!--slider--> 
  
  <!--scroll down-->
  <div class="scroll-down-btn" data-aos="fade-up"> <a href="#about-main-wrap"> <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/circle.svg" alt="circle"></a> 
  </div>
  <!--scroll down--> 
  
</section>
<!--header slider--> 
<section class="about-main-wrap" id="about-main-wrap"> 
  
  <!--about-->
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <div class="container bootstrap snippets bootdey " data-aos="fade-up">
<section id="services" class="current">
    <div class="services-top">
        <div class="container bootstrap snippets bootdey">
            <div class="row text-center">
                <div class="col-12">
                    <h2>What We Offer</h2>
                    <h2 style="font-size: 60px;line-height: 60px;margin-bottom: 20px;font-weight: 900;">What you really need</h2>
                    <p>We offer wider range of services to ensure you get what you need, all under one roof.</p>
                </div>
            </div>
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="services-list">
              <div class="row">
                  <div class="col-sm-6 col-md-4">
                      <div class="service-block" style="visibility: visible;">
                          <div class="ico fa fa-magic highlight"></div>
                          <div class="text-block">
                              <div class="name">Graphic Design</div>
                              <div class="info">Beauty and function</div>
                              <div class="text">Branding & Identity Design, Logo Design, Web Design, Product Design, Packaging Design, Thumbnails, Infographics, Amazon A+ </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                      <div class="service-block" style="visibility: visible;">
                          <div class="ico fa fa-code highlight"></div>
                          <div class="text-block">
                              <div class="name">Development/Coding</div>
                              <div class="info">Quality code that lasts</div>
                              <div class="text">Shopify, WordPress, Magento, WooCommerce, Hydrogen, Gatsby, Etc</div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                      <div class="service-block" style="visibility: visible;">
                          <div class="ico fa fa-pencil highlight"></div>
                          <div class="text-block">
                              <div class="name">Content Creation</div>
                              <div class="info">Words that tell your story</div>
                              <div class="text">Copywriting, Product Meta Content, Website Text Content, Scriptwriting, Ghostwriting</div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                      <div class="service-block" style="visibility: visible;">
                          <div class="ico fa fa-camera highlight"></div>
                          <div class="text-block">
                              <div class="name">Photograpphy</div>
                              <div class="info">High-quality images of your products & services</div>
                              <div class="text">Product Photography, Portrairs, Headshots, Events, Landscape, Realestate </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                      <div class="service-block" style="visibility: visible;">
                          <div class="ico fa fa-film highlight"></div>
                          <div class="text-block">
                              <div class="name">Motion Graphics</div>
                              <div class="info">Create engaging motion graphics to captivate and capture audiances attention</div>
                              <div class="text">Animations, Special Effects</div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                      <div class="service-block" style="visibility: visible;">
                          <div class="ico fa fa-video-camera highlight"></div>
                          <div class="text-block">
                              <div class="name">Video Production</div>
                              <div class="info">Professional videos that tells your brand story and helps with your sales</div>
                              <div class="text">Filming on Location, Video Editing, Casting, Sound Design, UGC</div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                      <div class="service-block" style="visibility: visible;">
                          <div class="ico fa fa-bullhorn highlight"></div>
                          <div class="text-block">
                              <div class="name">Web Marketing</div>
                              <div class="info">Converting users to customers</div>
                              <div class="text">SMM (Social Media Managment), SEO (Search Engine Optimizartion), PPC (Pay Per Click), Email Markting</div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                      <div class="service-block" style="visibility: visible;">
                          <div class="ico fa fa-shopping-cart highlight"></div>
                          <div class="text-block">
                              <div class="name">E-commerce</div>
                              <div class="info">Helping you run your shop</div>
                              <div class="text">E-commerce Management, Product Management, System Administration, Shipping & Fulfilment</div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                      <div class="service-block" style="visibility: visible;">
                          <div class="ico fa fa-umbrella highlight"></div>
                          <div class="text-block">
                              <div class="name">Strategy/Planning</div>
                              <div class="info">Thinking beyond tomorrow</div>
                              <div class="text">1 & 1 Consultation, Website audit, Reports</div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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

<!--content-->
<section class="content-main-wrap"> 
  <?php $info_heading = get_field('info_heading'); ?>
  
  <!--numbers-->
  <div class="site-number-main-wrap">
    <div class="container">
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
        endif; ?>
      </ul>
    </div>
  </div>
  <!--numbers--> 

  <!--Our Featured Projects-->
  <?php 
  $project_heading = get_field('project_heading');
  $project_description = get_field('project_description');
  $project_button_text = get_field('project_button_text');
  $project_button_link = get_field('project_button_link');
  ?>
  
  <div class="featured-main-wraper">
    <div class="container"> 
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
            'posts_per_page' => 4,
            'order'          => 'DESC',
            'post_type'      => 'projects',
            'post_status'    => 'publish'
          );
          $query = new WP_Query($args);

          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); 
              $thumbnail_url = esc_url(wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())));
              ?>
              <li class="col-md-6">
                <div class="listing-featured-wrap" data-aos="fade-up">
                  <div class="listing-featured-wrap-image" style="background: url(<?php echo $thumbnail_url; ?>) no-repeat top;"></div>
                  <div class="listing-featured-text">
                    <div class="tag-featured-wrap">
                      <?php 
                      $terms = wp_get_post_terms(get_the_ID(), array('project_category'));
                      foreach ($terms as $term) : ?>
                        <span><?php echo esc_html($term->name); ?></span>
                      <?php endforeach; ?>
                    </div>
                    <h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h3>
                    <p>
                      <?php
                      $excerpt = wp_trim_words(get_the_content(), 24, '...');
                      echo esc_html($excerpt);
                      ?>
                    </p>
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
      
      <div class="see-more-btn" data-aos="fade-up">
        <a href="<?php echo esc_url($project_button_link); ?>"><?php echo esc_html($project_button_text); ?></a>
      </div>
    </div>
  </div>
  <!--Our Featured Projects--> 

  <!--Testimonials Section-->
  <?php $testimonial_heading = get_field('testimonial_heading'); ?>
  
  <section class="client-main-review-wrap"> 
    <div class="client-heading-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 data-aos="fade-up"><?php echo wp_kses_post($testimonial_heading); ?></h2>
          </div>
        </div>
      </div>
    </div>
    
    <div class="clients-slider-wrap" data-aos="fade-up">
      <div class="carousel-wrap">
        <div class="owl-carousel">
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

  <!--CTA Section-->
  <?php 
  $cta_heading = get_field('cta_heading');
  $cta_button_text = get_field('cta_button_text');
  $cta_button_link = get_field('cta_button_link');
  ?>
  
  <div class="cta-main-wraper">
    <div class="container">
      <h2 data-aos="fade-up"><?php echo wp_kses_post($cta_heading); ?></h2>
      <div class="btn-cta-wrap">
        <a class="homeStartNowBtn" href="<?php echo esc_url($cta_button_link); ?>"><?php echo esc_html($cta_button_text); ?></a>
      </div>
    </div>
  </div>
  <!--CTA Section--> 

</section>
<!--content--> 

<?php
get_footer();