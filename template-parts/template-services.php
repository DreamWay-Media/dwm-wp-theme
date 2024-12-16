<?php 
/* Template Name: Services Template */ 

get_header();
?>
<!-- Font Awesome Library Link -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<!--header slider-->
<section class="header-slider-wrap inner-header-slider-wrap inner-service-wrap"> 
  <?php 
  $our_service_banner_description = get_field('our_service_banner_description');
  ?>
  <!--slider-->
  <section class="service-slider-wrap">
    <div class="container">
      <h1 id="services-title">Our Services</h1>
      <p><?php echo esc_html( $our_service_banner_description ); ?></p>
    </div>
  </section>
  <!--slider--> 
</section>
<!--header slider--> 

<!--content-->
<section class="content-main-wrap"> 
  <!--services-->
  <section class="services-listing-wraper">
    <div class="container">
      <ul class="accordion" id="accordionMain">
<?php
    // Custom query to fetch `service_icon` for each service
    $args = array(
        'post_type' => 'services',
        'posts_per_page' => -1,  // Fetch all services
        'order' => 'ASC',
        'orderby' => 'menu_order',
    );
    $services_query = new WP_Query($args);
    $service_icons = array();
    if ($services_query->have_posts()) :
        while ($services_query->have_posts()) : $services_query->the_post();
            $service_icon = get_field('service_icon') ?: 'fa fa-star';  // Default icon if empty
            $service_icons[] = $service_icon;  // Store each icon in array
        endwhile;
        wp_reset_postdata();
    endif;
?>

        <?php if( have_rows('our_services') ): ?>
          <?php 
          $counter = 1;
          while( have_rows('our_services') ): the_row(); 
            $service_heading = get_sub_field('service_heading');
            $service_description = get_sub_field('service_description');
            $service_image = get_sub_field('service_image');
            $service_id = preg_replace("/[^a-zA-Z]+/", "", $service_heading); // Generate sanitized ID
          ?>
            <li class="accordion-item">
              <!-- Assign unique ID to the accordion section -->
              <div class="service-list-wrap" id="<?php echo esc_attr($service_id); ?>">

                <!-- Desktop Layout -->
                <div class="d-none d-md-block">
                  <div class="row">
                    <div class="col-md-6 d-flex align-items-center">
                      <div class="listing-service-wrap">
                        <?php
                          // Display icon from `service_icons` array
                          $icon_index = $counter - 1;  // Adjust for 0-based indexing
                          echo '<i class="' . esc_attr($service_icons[$icon_index]) . ' ico highlight"></i>';
                        ?>
                      </div>
                      <h3 class="service-heading mb-0 ms-3"><?php echo esc_html( $service_heading ); ?></h3>
                    </div>
                    <div class="col-md-6 d-flex flex-row">
                      <div class="pe-4 flex-grow-1">
                        <p class="mb-0" style="font-size: 1rem; color: grey;">
                          <?php echo esc_html( $service_description ); ?>
                        </p>
                      </div>
                      <button class="accordion-button <?php echo ($counter === 1) ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseService<?php echo $counter; ?>" aria-expanded="<?php echo ($counter === 1) ? 'true' : 'false'; ?>" aria-controls="collapseService<?php echo $counter; ?>">
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Accordion Content -->
                <div id="collapseService<?php echo $counter; ?>" class="accordion-collapse collapse <?php echo ($counter === 1) ? 'show' : ''; ?> mt-3" aria-labelledby="<?php echo esc_attr($service_id); ?>" data-bs-parent="#accordionMain">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="service-inner-image">
                        <img src="<?php echo esc_url( $service_image['url'] ); ?>" alt="<?php echo esc_attr( $service_image['alt'] ); ?>" title="<?php echo esc_attr( $service_image['alt'] ); ?>">
                      </div>
                    </div>
                    <div class="col-md-12 mt-3">
                      <div class="service-list-info">
                        <?php if( have_rows('service_features') ): ?>
                          <ul class="row">
                            <?php 
                            while( have_rows('service_features') ): the_row(); 
                              $feature_image = get_sub_field('feature_image');
                              $feature_title = get_sub_field('feature_title');
                              $feature_description = get_sub_field('feature_description');
                            ?>
                              <li class="col-md-6">
                                <div class="inner-list-service">
                                  <h5>
                                    <img src="<?php echo esc_url( $feature_image['url'] ); ?>" alt="<?php echo esc_attr( $feature_image['alt'] ); ?>" title="<?php echo esc_attr( $feature_image['title'] ); ?>">
                                    <?php echo esc_html( $feature_title ); ?>
                                  </h5>
                                  <p><?php echo wp_kses_post( $feature_description ); ?></p>
                                </div>
                              </li>
                            <?php endwhile; ?>
                          </ul>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </li>
          <?php 
          $counter++;
          endwhile; ?>
        <?php endif; ?>
      </ul>
    </div>
  </section>
  <!--services--> 
</section>
<!--content-->

<!-- JavaScript to Handle URL Hash Targeting -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Function to handle hash navigation
        function handleHashNavigation() {
            const hash = window.location.hash; // Get the current hash
            if (hash) {
                const targetAccordion = document.querySelector(hash); // Find the element with the matching ID
                if (targetAccordion) {
                    // Close any currently open sections
                    const openAccordions = document.querySelectorAll('#accordionMain .accordion-collapse.show');
                    openAccordions.forEach(function (openAccordion) {
                        openAccordion.classList.remove('show'); // Remove the 'show' class
                        openAccordion.setAttribute('aria-expanded', 'false');
                    });

                    // Expand the targeted accordion
                    const collapseElement = targetAccordion.querySelector('.accordion-collapse');
                    if (collapseElement) {
                        collapseElement.classList.add('show'); // Add 'show' class to expand the section
                        collapseElement.setAttribute('aria-expanded', 'true');
                    }

                    // Scroll to the accordion
                    targetAccordion.scrollIntoView({ behavior: 'smooth' });
                }
            }
        }

        // Initial hash handling when the page loads
        handleHashNavigation();

        // Add an event listener for hash changes (e.g., clicking a link on the same page)
        window.addEventListener("hashchange", handleHashNavigation);
    });
</script>
<?php get_footer(); ?>

<style>
    .listing-service-wrap .ico {
        font-size: 32px;
        float: left;
    }
    .listing-service-wrap .highlight {
        color: #a0ca00;
        font-weight: bold;
    }
</style>


