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
  <div class="container bootstrap snippets bootdey home-container">
<!-- Services Section -->
<section id="services" class="current">
      <div class="services-top">
        <div class="container bootstrap snippets bootdey home-container">
          <div class="row text-center">
            <div class="col-12">
              <h2>Elevate Customer Experiences with Tailored AI</h2>
              <h2 class="highlighted-heading">Bespoke E-Commerce Automation Agency</h2>
              <p>Create loyal customers with experiences and engagement that feel personal. 
                Our solution engineers develop innovative AI tools that assist in automating 
                customer interaction, anticipate needs, reduce friction, and drive satisfaction across your entire digital storefront. 
                Our robust AI content generation and strategy toolkits are customized for efficiency and growth.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div id="progression" class="services-list">
                <div class="services-list__wrapper">
                  <div class="services-list__bar-bg"></div>
                  <div class="services-list__bar"></div>
                  <div class="services-list__columns">
                    <?php 
                    $services = get_field('we_offer_services');
                    if ($services):
                      foreach ($services as $service):
                        $icon_before = $service['process_icon_before'];
                        $icon_after  = $service['process_icon_after'];
                        $process_text = $service['process_text'];
                        $process_link = $service['process_link'];
                    ?>
                      <div class="services-list__col">
                        <div class="services-list__icon">
                          <img class="icon-before" src="<?php echo esc_url($icon_before['url']); ?>" alt="<?php echo esc_attr($icon_before['alt']); ?>">
                          <img class="icon-after" src="<?php echo esc_url($icon_after['url']); ?>" alt="<?php echo esc_attr($icon_after['alt']); ?>">
                        </div>
                        <div class="services-list__circle"></div>
                        <div class="services-list__name-block">
                          <?php if ($process_link): ?>
                            <a href="<?php echo esc_url($process_link); ?>">
                              <?php echo esc_html($process_text); ?>
                            </a>
                          <?php else: ?>
                            <?php echo esc_html($process_text); ?>
                          <?php endif; ?>
                        </div>
                      </div>
                    <?php endforeach; endif; ?>
                  </div>
                </div>
              </div>
              <div class="reach-us-btn" data-aos="fade-up">
                <a href="/services/">Explore Solutions</a>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- End of Services Section -->
  </div>  
</section>

<!-- Toolkits Section -->
<?php
if( function_exists('get_field') ):  
    // Stored fields in variables
    $toolkits_heading = get_field('toolkits_heading');
?>
<section class="toolkits-main-wrap py-5">
    <div class="container">
        <!-- Toolkits Heading -->
        <?php if( $toolkits_heading ): ?>
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h3><?php echo $toolkits_heading; ?></h3>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Toolkits Content -->
        <?php if( have_rows('toolkits_content') ): ?>
            <div class="row justify-content-center mb-5 g-1">
                <?php 
                while( have_rows('toolkits_content') ): the_row();
                    $toolkit_image = get_sub_field('toolkit_image');
                    $toolkit_subheading = get_sub_field('toolkit_subheading');
                    $toolkit_text = get_sub_field('toolkit_text');
                    $toolkit_button_text = get_sub_field('toolkit_button_text');
                    $toolkit_button_link = get_sub_field('toolkit_button_link');
                ?>
                    <div class="col-md-4 col-sm-12 text-center mb-4">
                        <?php if($toolkit_image): ?>
                            <div class="toolkit-icon mb-3">
                                <img src="<?php echo esc_url($toolkit_image['url']); ?>" 
                                     alt="<?php echo esc_attr($toolkit_text); ?>"
                                     class="img-fluid">
                            </div>
                        <?php endif; ?>
                        <?php if($toolkit_subheading): ?>
                            <div class="toolkit-subheading mb-3">
                                <h4><?php echo esc_html($toolkit_subheading); ?></h4>
                            </div>
                        <?php endif; ?>
                        <?php if($toolkit_text): ?>
                            <div class="toolkit-text">
                                <p class="text-center mb-0 p-5"><?php echo wp_kses_post($toolkit_text); ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if($toolkit_button_text): ?>
                            <div class="reach-us-btn mt-3">
                                <a href="<?php echo esc_url($toolkit_button_link); ?>" class="btn"><?php echo esc_html($toolkit_button_text); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<!-- End Toolkits Section -->
<!-- LLM Logos Section -->
<?php
if( function_exists('get_field') ):  
    // Stored fields in variables
    $llm_heading = get_field('llm_heading');
?>
<section class="llm-main-wrap pt-4 pb-2">
  <div class="container">
  <?php if( $llm_heading ): ?>
    <div class="row mb-5">
      <div class="col-12 text-center">
        <h3><?php echo $llm_heading; ?></h3>
      </div>
    </div>
    <?php endif; ?>
    <?php if( have_rows('llm_company_list') ): ?>
      <div class="row justify-content-center mb-5 g-0">
        <?php while( have_rows('llm_company_list') ): the_row();
          $llm_image = get_sub_field('llm_image');
          ?>
          <div class="col-md-4 col-sm-12 text-center mb-4">
            <?php if($llm_image): ?>
              <img src="<?php echo esc_url($llm_image['url']); ?>" alt="<?php echo esc_attr($llm_image['alt']); ?>" class="img-fluid">
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
<!-- End LLM Logos Section -->
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
  
<?php
if( function_exists('get_field') ):  
    $cs_title = get_field('cs_title');
    $cs_subheading = get_field('cs_subheading');
?>
   <!-- Case Study Section -->
  <div class="case-study-wrap">
    <div class="container home-container">
      <!-- Case Study Heading Section -->
      <div class="row text-center mb-5">
        <div class="col-12">
          <h2 class="case-study-heading"><?php echo $cs_title; ?></h2>
          <h3 class="case-study-subheading"><?php echo $cs_subheading; ?></h3>
        </div>
      </div>
      <!-- Case Study Content -->
      <div class="row text-center case-study-content-row">
        <?php if( have_rows('cs_section_1') ):?>
          <?php while( have_rows('cs_section_1') ): the_row(); ?>
            <div class="col-md-6">
              <div class="case-study-column">
                <div class="case-study-content">
                  <?php if(get_sub_field('cs_section_1_title')): ?>
                    <h3 class="case-study-title"><?php echo get_sub_field('cs_section_1_title'); ?></h3>
                  <?php endif; ?>
                  <?php if(get_sub_field('cs_section_1_subtitle')): ?>
                    <h4 class="case-study-subtitle"><?php echo get_sub_field('cs_section_1_subtitle'); ?></h4>
                  <?php endif; ?>
                  <div class="case-study-spacing"></div>
                  <?php if(get_sub_field('cs_section_1_description')): ?>
                    <p class="case-study-description"><?php echo get_sub_field('cs_section_1_description'); ?></p>
                  <?php endif; ?>
                </div>
                <div class="case-study-white-box">
                <?php if(get_sub_field('cs_section_1_image')): ?>
                  <img class="case-study-main-image" src="<?php echo esc_url(get_sub_field('cs_section_1_image')['url']); ?>" alt="<?php echo get_sub_field('cs_section_1_title'); ?>">
                <?php endif; ?>
                  <!-- Content for section 1 will go here -->
                   <p>Trail Chews is a testament to how Generative AI can empower businesses to launch rapidly while maintaining high-quality brand execution. 
                    From ideation and product development to digital commerce and marketing, AI played an integral role in every stage of the business, 
                    demonstrating that technology can drive efficiency, innovation, and social impact simultaneously.</p>
                    <img class="case-study-inline-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cs-hp-group.png" alt="group image">
                   <p>Users wanted to track new followers/unfollowers, top interactions, easily block or mute, 
                      and audience growth trends at a glance</p>
                   <img class="case-study-inline-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cs-hp-bar-chart.png" alt="bar chart">
                   <p>Existing solutions for BlueSky primarily focused on posting content without any engagement analytics which would be beneficial 
                      for streamlined communication and marketing.</p>
                   <img class="case-study-inline-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cs-hp-warning.png" alt="warning">
                   <p>With the rise of fake accounts, users were concerned about bot-driven engagement, leading to skewed audience metrics and potential reputational risks.</p>
                   <img class="case-study-inline-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cs-hp-checkmark.png" alt="checkmark">
                   <p>No AI sourced fact-checking capabilities</p>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php if( have_rows('cs_section_2') ):?>
          <?php while( have_rows('cs_section_2') ): the_row(); ?>
            <div class="col-md-6">
              <div class="case-study-column">
                <div class="case-study-content">
                  <?php if(get_sub_field('cs_section_2_title')): ?>
                    <h3 class="case-study-title"><?php echo get_sub_field('cs_section_2_title'); ?></h3>
                  <?php endif; ?>
                  <?php if(get_sub_field('cs_section_2_subtitle')): ?>
                    <h4 class="case-study-subtitle"><?php echo get_sub_field('cs_section_2_subtitle'); ?></h4>
                  <?php endif; ?>
                  <div class="case-study-spacing"></div>
                  <?php if(get_sub_field('cs_section_2_description')): ?>
                    <p class="case-study-description"><?php echo get_sub_field('cs_section_2_description'); ?></p>
                  <?php endif; ?>
                </div>
                <div class="case-study-white-box">
                  <?php if(get_sub_field('cs_section_2_image')): ?>
                    <img class="case-study-main-image" src="<?php echo esc_url(get_sub_field('cs_section_2_image')['url']); ?>" alt="<?php echo get_sub_field('cs_section_2_title'); ?>">
                  <?php endif; ?>
                  <!-- Content for section 2 will go here -->
                   
                   <p>Bluesky Social is rapidly gaining popularity as a decentralized social media platform, but its functionality remains limited. 
                    Users face challenges in managing followers, indentifying bot, and filtering disinformation - highlighting the need for better 
                    companion applications to navigate the platform effectively.</p>
                    <img class="case-study-inline-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cs-hp-group.png" alt="group image">
                    <p>Users wanted to track new followers/unfollowers, top interactions, easily block or mute, and audience growth trends at a glance</p>
                    <img class="case-study-inline-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cs-hp-bar-chart.png" alt="bar chart">
                    
                    <p>Existing solutions for BlueSky primarily focused on posting content without any engagement analytics which would be beneficial 
                      for streamlined communication and marketing.</p>
                      <img class="case-study-inline-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cs-hp-warning.png" alt="warning">
                    <p>With the rise of fake accounts, users were concerned about bot-driven engagement, leading to skewed audience metrics and potential reputational risks.</p>
                    <img class="case-study-inline-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cs-hp-checkmark.png" alt="checkmark">
                    <p>No AI sourced fact-checking capabilities</p>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
  <!-- End Case Study Section -->
<?php endif; ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  gsap.registerPlugin(ScrollTrigger);

  let circles = document.querySelectorAll(".services-list__circle");
  let icons   = document.querySelectorAll(".services-list__icon");
  let names   = document.querySelectorAll(".services-list__name-block");
  let fillBar = document.querySelector(".services-list__bar");
  let barBg   = document.querySelector(".services-list__bar-bg");
  let wrapper = document.querySelector(".services-list__wrapper");
  let servicesSection = document.querySelector("#services");

  let totalSteps = circles.length;
  let totalBarDimension = 0; // will hold width (desktop) or height (mobile)

  /**
   * Position the barBg and fillBar between the first and last circle.
   * Calculates totalBarDimension (the distance between first & last circle).
   */
  function updateProgressBar() {
    if (!wrapper || !fillBar || !barBg) return;

    let firstCircle = document.querySelector(".services-list__columns .services-list__col:first-child .services-list__circle");
    let lastCircle  = document.querySelector(".services-list__columns .services-list__col:last-child .services-list__circle");

    if (!firstCircle || !lastCircle) return;

    const wrapperRect = wrapper.getBoundingClientRect();
    const firstRect   = firstCircle.getBoundingClientRect();
    const lastRect    = lastCircle.getBoundingClientRect();

    if (window.innerWidth > 768) {
      // Desktop (horizontal layout)
      const left  = firstRect.left - wrapperRect.left + firstRect.width / 2;
      const right = lastRect.right - wrapperRect.left - lastRect.width / 2;
      totalBarDimension = right - left;

      const top = firstRect.top - wrapperRect.top + firstRect.height / 2 - 6;

      // Grey bar background
      barBg.style.left   = left + "px";
      barBg.style.top    = top + "px";
      barBg.style.width  = totalBarDimension + "px";
      barBg.style.height = "12px";

      // Green fill bar
      fillBar.style.left   = left + "px";
      fillBar.style.top    = top + "px";
      fillBar.style.width  = "0px"; // reset to 0 each time
      fillBar.style.height = "12px";
    } else {
      // Mobile (vertical layout)
      const centerX  = firstRect.left - wrapperRect.left + firstRect.width / 2 - 6;
      const topPos    = firstRect.top - wrapperRect.top + firstRect.height / 2;
      const bottomPos = lastRect.top - wrapperRect.top + lastRect.height / 2;
      totalBarDimension = bottomPos - topPos;

      // Grey bar background
      barBg.style.left   = centerX + "px";
      barBg.style.top    = topPos + "px";
      barBg.style.height = totalBarDimension + "px";
      barBg.style.width  = "12px";

      // Green fill bar
      fillBar.style.left   = centerX + "px";
      fillBar.style.top    = topPos + "px";
      fillBar.style.height = "0px"; // reset to 0 each time
      fillBar.style.width  = "12px";
    }
  }

  /**
   * Activates or deactivates icons/circles/names based on the progress
   * @param {number} progress - a value between 0 and 1
   */
  function updateActiveSteps(progress) {
    let stepProgress = progress * (totalSteps - 1);
    let stepIndex    = Math.round(stepProgress);

    circles.forEach((circle, i) => {
      circle.classList.toggle("active", i <= stepIndex);
    });
    icons.forEach((icon, i) => {
      icon.classList.toggle("active", i <= stepIndex);
    });
    names.forEach((name, i) => {
      name.classList.toggle("active", i <= stepIndex);
    });
  }

  /**
   * Create ScrollTriggers with matchMedia to handle Desktop vs Mobile.
   */
  ScrollTrigger.matchMedia({
    // =========== DESKTOP: pinned horizontal progress ===========
    "(min-width: 769px)": function() {
      updateProgressBar();

      ScrollTrigger.create({
        trigger: "#services",
        start: "top top",
        end: () => "+=" + (totalBarDimension + 100), 
        scrub: 2,
        pin: true,            
        pinSpacing: true,     
        onUpdate: (self) => {
          // Fill the bar horizontally
          fillBar.style.width = (self.progress * totalBarDimension) + "px";
          // Activate circles/icons/text
          updateActiveSteps(self.progress);
        },
      });
    },
    // =========== MOBILE: pinned vertical progress ===========
    "(max-width: 768px)": function() {
      updateProgressBar();

      ScrollTrigger.create({
        trigger: "#progression",
        start: "top top", 
        end: () => "+=" + (totalBarDimension + 100), 
        scrub: 2,
        pin: true,
        pinSpacing: true,

        onUpdate: (self) => {
          // Fill the bar vertically
          fillBar.style.height = (self.progress * totalBarDimension) + "px";
          // Activate circles/icons/text
          updateActiveSteps(self.progress);
        },
      });
    }
  });
  updateProgressBar();
  window.addEventListener("resize", function() {
    requestAnimationFrame(function() {
      updateProgressBar();
      ScrollTrigger.refresh();
    });
  });
});
</script>
<?php
get_footer();