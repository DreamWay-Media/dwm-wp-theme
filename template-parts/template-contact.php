<?php 
/* Template Name: Contact Temp */ 
get_header();
?>

<?php 
  // Fetch contact page fields
  $contact_main_heading      = get_field('contact_main_heading');
  $contact_description       = get_field('contact_description');
  $contact_email             = get_field('contact_email');
  $contact_timing            = get_field('contact_timing');
  $contact_address           = get_field('contact_address');
  $contact_facebook_link     = get_field('contact_facebook_link');
  $contact_twitter_link      = get_field('contact_twitter_link');
  $contact_linkedin_link     = get_field('contact_linkedin_link');
  $contact_feature_review_heading = get_field('contact_feature_review_heading');
  $contact_review_message    = get_field('contact_review_message');
  $review_user_name          = get_field('review_user_name');
  $review_user_image         = get_field('review_user_image');
  $review_user_designation   = get_field('review_user_designation');
?>

<!--content-->
<section class="content-main-wrap"> 
  <!--contact-->
  <section class="contact-main-wraper">
    <div class="container">
      <div class="row"> 
        <!--text-->
        <div class="col-md-6">
          <div class="contact-text-wrap">
            <h3><?php echo esc_html($contact_main_heading); ?></h3>
            <p><?php echo esc_html($contact_description); ?></p>
            <ul>
              <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/emial-contact.svg" alt="email"> <?php echo esc_html($contact_email); ?></li>
              <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/time-contact.svg" alt="time"> <?php echo esc_html($contact_timing); ?></li>
              <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/location-contact.svg" alt="location"> <?php echo esc_html($contact_address); ?></li>
            </ul>
            <div class="contact-review-wrap">
              <h5><?php echo esc_html($contact_feature_review_heading); ?></h5>
              <p><?php echo esc_html($contact_review_message); ?></p>
              <div class="review-contact-wrap">
                <div class="review-contact-image" style="background:url(<?php echo esc_url($review_user_image['url']); ?>) no-repeat top;"></div>
                <div class="review-contact-text">
                  <h4><?php echo esc_html($review_user_name); ?></h4>
                  <span><?php echo esc_html($review_user_designation); ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--text--> 
        
        <!--form-->
        <div class="col-md-6">
          <div class="contact-form-wraper">
            <?php echo do_shortcode('[contact-form-7 id="52e6b3f" title="Contact form 1"]'); ?>
          </div>
        </div>
        <!--form--> 
      </div>
    </div>
  </section>
  <!--contact--> 
</section>
<!--content--> 
<?php
// Replace 123 with the actual ID of your home page
$home_page_id = 6;

if (have_rows('testimonials', $home_page_id)) : ?>
    <section class="client-main-review-wrap">
        <div class="client-heading-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 data-aos="fade-up"><?php echo get_field('testimonial_heading', $home_page_id); ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="clients-slider-wrap" data-aos="fade-up">
            <div class="carousel-wrap">
                <div class="owl-carousel">
                    <?php while (have_rows('testimonials', $home_page_id)) : the_row(); 
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
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <p>No testimonials available at the moment.</p>
<?php endif; ?>


<?php
get_footer();

