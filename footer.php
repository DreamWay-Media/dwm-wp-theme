<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dreamway_Media
 */

?>
<?php

      $mini_form_description = get_field('mini_form_description', 'option');
			$footer_logo = get_field('footer_logo', 'option');
			$footer_description = get_field('footer_description', 'option');
			$footer_copyrights_text = get_field('footer_copyrights_text', 'option');
			
		?>
<!--cta-->
<?php if (!is_page('contact')) : ?>
<div class="cta-main-wraper">
    <div class="container">
      <h2 data-aos="fade-up" class="aos-init aos-animate"><?php echo $mini_form_description; ?></h2>
      <?php echo do_shortcode('[contact-form-7 id="b8b65df" title="Mini Footer Form"]'); ?>
    </div>
</div>
<?php endif; ?>
<!--cta-->
<!-- "This Website is Green" Text -->
<div class="website-green-tag">
    <!-- Eco-Friendly Tag -->
    <div class="eco-friendly-tag">
        <a href="https://www.greengeeks.com" alt="GreenGeeks" rel="nofollow">
            <img src="https://greengeeks.com/includes/images/green-tags/Green_15.png" border="0" alt="Eco Friendly Tag">
        </a>
    </div>
    <!-- Inverted Text -->
    <?php 
        // Fetching the ACF field value for the green website text
        $website_green_text = get_field('website_green_text', 'option'); 
        if ($website_green_text) {
            echo '<span class="website-green-text">' . esc_html($website_green_text) . '</span>';
        }
    ?>
</div>
<!--footer-->
<footer class="footer-main-wraper">
  <div class="container">
    <div class="row"> 
      <!--logo, detail-->
      <div class="col-md-6">
  <div class="footer-logo-wrp">
    <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['title']; ?>">
  </div>
</div>

      <!--logo, detail--> 
      
      <!--footer nav + social-->
      <div class="col-md-6"> 
        <!-- Social icons + Navigation wrapper -->
        <div class="footer-social-nav-wrap" style="position: relative;">
          <!-- Footer Widget Area for Social Links -->
          <div class="footer-widget-area">
            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
              <?php dynamic_sidebar( 'footer-1' ); ?>
            <?php endif; ?>
          </div>
      <!--social icons-->
          
      <!--nav-->
        <div class="footer-nav-wrap">
          <ul>
		  <?php 
					$menuitems = wp_get_nav_menu_items( 3, array( 'order' => 'DESC' ) );
					$count = 0;
					$submenu = false;
						foreach( $menuitems as $item ):

								$link = $item->url;
								$title = $item->title;
								// item does not have a parent so menu_item_parent equals 0 (false)
								

								// save this id for later comparison with sub-menu items
								$parent_id = $item->ID;
							?>

								<li class="item">
									<a href="<?php echo $link; ?>" class="title">
										<?php echo $title; ?>
									</a>
									</li>
				<?php $count++; endforeach; ?>
          </ul>
        </div>
        <!--copyright-->
        <div class="copyright-wrap"> <?php echo $footer_copyrights_text; ?></div>
        <!--copyright--> 
      </div>
      <!--footer nav--> 
    </div>
  </div>
</footer>
<!--footer--> 
<!-- js --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> 
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/aos.js"></script> 
<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/owl.carousel.min.js"></script> 

<script>
document.addEventListener("DOMContentLoaded", function() {
    var heroSlider = document.getElementById('hero-slider');
    if (heroSlider) {
        var totalSlides = $('#hero-slider .slide-item').length;

        // Initialize the hero slider
        $(heroSlider).owlCarousel({
            loop: totalSlides > 1, // Only loop if more than 1 slide
            margin: 10,
            nav: false,
            dots: totalSlides > 1, // Show dots only if there is more than 1 slide
            items: 1, // Ensure only one slide shows at a time
            autoplay: totalSlides > 1, // Enable autoplay only if more than 1 slide
            autoplayTimeout: 7000,
            navText: ['<span class="owl-nav-prev">&lt;</span>', '<span class="owl-nav-next">&gt;</span>'],
            mouseDrag: totalSlides > 1, // Enable drag only if more than 1 slide
            touchDrag: totalSlides > 1 // Enable touch drag only if more than 1 slide
        });
    }
});
</script>
<!--owl--> 
<script>
    $('#testimonial-slider').owlCarousel({
  loop: true,
  margin:15,
  nav: true,
  navText: [
    "<i class='fa fa-angle-left'></i> previous ",
    "next <i class='fa fa-angle-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 2
    },
    1000: {
      items:4
    }
  }
})
</script>

<!--owl-->
<script>
    $('#demo-slider').owlCarousel({
      loop: true,
      margin: 15,
      nav: true,
      navText: [
        "<i class='fa fa-angle-left'></i> previous ",
        "next <i class='fa fa-angle-right'></i>"
      ],
      autoplay: false,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1,
          margin: 24,
        }
      }
    })
</script>
<!--owl-->
<!--owl--> 

<!--owl--> 
<script>
    $('.partner-carousel').owlCarousel({
  loop: true,
  margin:15,
  nav: true,
  navText: [
    "<i class='fa fa-angle-left'></i> previous ",
    "<i class='fa fa-angle-right'></i> next "
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 3
    },
    600: {
      items:3
    },
    1000: {
      items:4
    }
  }
})
</script> 
<!--owl--> 

<!--animation--> 
<script>
    AOS.init({offset: 90, once: false,  disable: 'phone', duration: 1000,
      initClassName: 'aos-init',
      animatedClassName: 'aos-animate',
      useClassNames: false,
      disableMutationObserver: false,
      debounceDelay:990,
      throttleDelay:9,
      }); 

 </script> 
<!--//animation-->
<?php wp_footer(); ?>
</body>
</html>
