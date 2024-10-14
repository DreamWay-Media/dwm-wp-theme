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
			$footer_logo = get_field('footer_logo', 'option');
			$footer_description = get_field('footer_description', 'option');
			$footer_copyrights_text = get_field('footer_copyrights_text', 'option');
			
		?>

<!--footer-->
<footer class="footer-main-wraper">
  <div class="container">
    <div class="row"> 
      
      <!--logo, detail-->
      <div class="col-md-6">
        <div class="footer-logo-wrp"> <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['url']; ?>" title="<?php echo $footer_logo['title']; ?>"> </div>
        <p> <?php echo $footer_description; ?></p>
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
            <?php else : ?>
              <p>Add widgets to the Footer Widget Area via WordPress admin.</p>
            <?php endif; ?>
          </div>
      <!--social icons-->
          
      <!--nav-->
        <div class="fotoer-nav-wrap">
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
        <!--nav--> 
        
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

<!--owl--> 
<script>
    $('.owl-carousel').owlCarousel({
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
