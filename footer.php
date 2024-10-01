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

<?php
      $linkedin_url = 'https://www.linkedin.com/company/dreamwaymedia/';
      $twitter_url = 'https://x.com/dreamwaymedia/';
      $youtube_url = 'https://www.youtube.com/@dreamwaymedia6203/';
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
          <!--social icons-->
          <div class="footer-social-icons" style="text-align: left;">
            <ul style="list-style: none; padding: 0; display: flex; gap: 15px;">
              <li><a href="<?php echo $linkedin_url; ?>" target="_blank" title="LinkedIn"><i class="fab fa-linkedin fa-2x"></i></a></li>
              <li><a href="<?php echo $twitter_url; ?>" target="_blank" title="Twitter"><i class="fab fa-twitter fa-2x"></i></a></li>
              <li><a href="<?php echo $youtube_url; ?>" target="_blank" title="YouTube"><i class="fab fa-youtube fa-2x"></i></a></li>
            </ul>
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

  <style>
    /* Footer Social Icons - General Styles */
    .footer-social-icons ul {
      display: flex;
      justify-content: flex-start;
      gap: 10px;
      padding: 0;
      margin: 0;
    }
    .footer-social-icons ul li a i {
      font-size: 2rem;
      color: #fff;
      transition: color 0.3s ease;
    }
    .footer-social-icons ul li a i:hover {
      color: #c8f031; 
    }
    /* Media Queries for smaller screens */
    @media (max-width: 768px) {
    .footer-social-icons ul li a i {
      font-size: 1.5rem; /* Smaller icon size for mobile */
    }
    .footer-social-icons {
      margin-top: 10px;
    }
    .footer-nav-wrap ul {
      text-align: left;
      padding-bottom: 30px;
    }
    }
    @media (max-width: 768px) {
    .footer-social-icons ul {
      display: flex; /* Ensure it uses flexbox */
      justify-content: flex-start !important; /* Force alignment to the left */
    }
    .footer-social-icons ul li a i {
      font-size: 1.5rem; /* Shrink the icons when the screen size is small */
    }
    .footer-nav-wrap {
      margin-top: 15px; /* Adjust nav links to create space from the social icons */
    }
    }

    /* Larger screens */
    .footer-social-icons ul li a i {
      font-size: 2rem; /* Keep the original icon size for larger screens */
    }
    .footer-social-nav-wrap {
      margin-top: 60px; /* Adjust for larger screens to move icons lower */
      padding-bottom: 43px;
    }
    .footer-social-icons ul {
      display: flex; /* Ensure it uses flexbox */
      justify-content: flex-end; /* Align to the right on larger screens */
    }
  </style>
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
    "<i class='fa fa-angle-right'></i> next "
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
