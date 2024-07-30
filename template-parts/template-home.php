<?php 
/* Template Name: Home Temp */ 

get_header();
?>
<section class="header-slider-wrap"> 
  
 <?php 
	
	$banner_heading = get_field('banner_heading');
	$banner_description = get_field('banner_description');
	$banner_image = get_field('banner_image');
	$banner_button_text = get_field('banner_button_text');
	$banner_button_link = get_field('banner_button_link');?>
  <!--slider-->
  <section class="slider-main-wrap">
    <div class="container">
      <div class="row">
        <div class="mobile-slider-image" data-aos="fade-up"><img src="<?php echo $banner_image['url'];?>" alt="<?php echo $banner_image['alt'];?>" title="<?php echo $banner_image['alt'];?>"></div>
        
        <!--text-->
        <div class="col-md-5">
          <div class="slider-text-wrap">
            <h1  data-aos="fade-up"><?php echo $banner_heading;?> </h1>
            <p data-aos="fade-up"><?php echo $banner_description;?></p>
            <div class="slider-text-btn" data-aos="fade-up"><a href="<?php echo $banner_button_link;?>"> <?php echo $banner_button_text;?> </a></div>
          </div>
        </div>
        <!--text--> 
        
        <!--image-->
        <div class="col-md-7">
          <div class="slider-image" data-aos="fade-up"><img src="<?php echo $banner_image['url'];?>" alt="<?php echo $banner_image['alt'];?>" title="<?php echo $banner_image['alt'];?>"></div>
        </div>
        <!--image--> 
        
      </div>
    </div>
  </section>
  <!--slider--> 
  
  <!--scroll down-->
  <div class="scroll-down-btn" data-aos="fade-up"> <a href="#arrowsection"> <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/circle.svg" alt="circle"> </a> </div>
  <!--scroll down--> 
  
</section>
<!--header slider--> 
	<?php 
	
	$we_offer_heading = get_field('we_offer_heading');
	$we_offer_description_right = get_field('we_offer_description_right');
	$we_offer_button_text = get_field('we_offer_button_text');
	$we_offer_button_link = get_field('we_offer_button_link');
	?>
<!--content-->
<section class="content-main-wrap"> 
  
  <!--service-->
  <section class="services-main-wraper">
    <div class="container"> 
      

      
      <div class="accordin-services-wrap" id="arrowsection">
        <div class="accordion" id="accordionExample">
           <?php if( have_rows('we_offer_services') ): ?>
						
				<?php 
				$counter=1;
				while( have_rows('we_offer_services') ): the_row(); 
					
						$service_title = get_sub_field('service_title');
						$service_description = get_sub_field('service_description');
						$service_image = get_sub_field('service_image');
						$service_button_text = get_sub_field('service_button_text');
						$service_button_link = get_sub_field('service_button_link');
						
					?>
						
							<div class="accordion-item">
								<h2 class="accordion-header" id="headingOne<?php echo $counter;?>">
								  <button data-aos="fade-up" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $counter;?>" aria-expanded="true" aria-controls="collapseOne">
								  <div class="number-accordin"> 0<?php echo $counter;?> </div>
								  <h4> <?php echo $service_title;?></h4>
								  <p> <?php echo $service_description;?></p>
								  </button>
								</h2>
								<div id="collapseOne<?php echo $counter;?>" class="accordion-collapse collapse <?php if($counter==1){ echo 'show';}?>" aria-labelledby="headingOne<?php echo $counter;?>" data-bs-parent="#accordionExample">
								  <div class="accordion-body">
									<div class="according-image-btn"  data-aos="flip-down">
									  <div class="image-services-wrap" style="background:url(<?php echo $service_image['url'];?>) no-repeat top;"></div>
									  <div class="arrow-icon-wrap"> <a href="<?php echo $service_button_link;?>"> <span> <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/arrow.svg" alt="arrow"> </span> <strong> <?php echo $service_button_text;?> </strong></a> </div>
									</div>
								  </div>
								</div>
							 </div>
		<?php 
					$counter++;
					endwhile; ?>
			<?php endif; ?>
		  
        </div>
      </div>
    </div>
  </section>
  <!--service--> 
  
  <?php 
	$info_heading = get_field('info_heading');
	?>
  
  <!--numbers-->
  <div class="site-number-main-wrap">
    <div class="container">
      <h3 data-aos="fade-up" data-aos-anchor-placement="top-bottom"> <?php echo $info_heading;?></h3>
		<ul class="row" data-aos="zoom-in-right">
				<?php if( have_rows('info_features') ): ?>
							
					<?php 
					$counter=1;
					while( have_rows('info_features') ): the_row(); 
						
							$features_count = get_sub_field('features_count');
							$feature_text = get_sub_field('feature_text');?>
							<li class="col-md-3">
							  <div class="number-list-wrap"> <strong> <?php echo $features_count;?> </strong>
								<h5> <?php echo $feature_text;?> </h5>
							  </div>
							</li>
								
					<?php 
						$counter++;
						endwhile; ?>
				<?php endif; ?>
		</ul>
    </div>
  </div>
  <!--numbers--> 
    <?php 
	$project_heading = get_field('project_heading');
	$project_description = get_field('project_description');
	$project_button_text = get_field('project_button_text');
	$project_button_link = get_field('project_button_link');
	?>
  <!--Our Featured Projects-->
  <div class="featured-main-wraper">
    <div class="container"> 
      
      <!--heading-->
      <div class="featured-heading-wrap">
        <div class="row">
          <div class="col-md-6">
            <h2 data-aos="fade-up"> <?php echo $project_heading;?> </h2>
          </div>
          <div class="col-md-6">
            <p data-aos="fade-left"><?php echo $project_description;?> </p>
          </div>
        </div>
      </div>
      <!--heading--> 
      
      <!--listing-->
      <div class="featured-listing-wrap">
        <ul class="row">
		<?php 
						$args = array (
										'posts_per_page' => 4, /* how many post you need to display */
										'offset' => 0,
										'order' => 'ASC',
										'post_type' => 'projects', /* your post type name */
										'post_status' => 'publish'
									);
						$query = new WP_Query( $args );
						// The Loop
						if ( $query->have_posts() ) {
							$counter=1;
							while ( $query->have_posts() ) {
									$query->the_post();
									$post_id = get_the_ID();
									 
									//$blog_short_description = get_field('blog_short_description', $post_id);?>
								
									  <li class="col-md-6">
										  <div class="listing-featured-wrap" data-aos="zoom-in-right">
											<div class="listing-featured-wrap-image" style="background:url(<?php echo  wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()))?>) no-repeat top;"></div>
											<div class="listing-featured-text">
											  <div class="tag-featured-wrap"> 
											  <?php $terms = wp_get_post_terms( $query->post->ID, array( 'project_category' ) ); ?>
													<?php foreach ( $terms as $term ) : ?>
													<span><?php echo $term->name; ?></span>
													<?php endforeach; ?> </div>
											  <h3> <a href="<?php echo get_the_permalink() ?>"> <?php the_title()?></a> </h3>
											  <p> <?php
												  $content = get_the_content();
													$excerpt = strip_tags($content);
													$words = explode(' ', $excerpt);
													$excerpt = implode(' ', array_slice($words, 0, 24));
													// Add "..." at the end if the content is longer than the specified substring length (24 words in this case)
													if (count($words) > 24) {
														$excerpt .= '...';
													}

													echo $excerpt;
												  ?></p>
											</div>
										  </div>
										</li>
									 
						<?php 
									
						$counter++;
							}
						} else {
							// no posts found
							echo '<h1 class="page-title screen-reader-text">No Posts Found</h1>';
						}
						// Restore original Post Data
						wp_reset_postdata();?>
        </ul>
      </div>
      <!--listing-->
      
      <div class="see-more-btn"  data-aos="fade-up"> <a href="<?php echo $project_button_link;?>"> <?php echo $project_button_text;?> </a> </div>
    </div>
  </div>
  <!--Our Featured Projects--> 
   <?php 
	$testimonial_heading = get_field('testimonial_heading');
	?>
  <!--What Our Clients Say?-->
  <section class="client-main-review-wrap"> 
    
    <!--heading-->
    <div class="client-heading-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2  data-aos="fade-up"> <?php echo $testimonial_heading;?> </h2>
          </div>
        </div>
      </div>
    </div>
    <!--heading--> 
    
    <!--listing-->
    <div class="clients-slider-wrap" data-aos="fade-up">
      <div class="carousel-wrap">
        <div class="owl-carousel">
         <?php if( have_rows('testimonials') ): ?>
							
					<?php 
					$counter=1;
					while( have_rows('testimonials') ): the_row(); 
						
							$customer_name = get_sub_field('customer_name');
							$customer_designation = get_sub_field('customer_designation');
							$customer_image = get_sub_field('customer_image');
							$customer_message = get_sub_field('customer_message');?>
							
							 <div class="item">
								<div class="listing-client-wrap">
								  <p> <?php echo $customer_message;?> </p>
								  <div class="client-name-image">
									<div class="client-image" style="background:url(<?php echo $customer_image['url'];?>) no-repeat top;"></div>
									<div class="client-name">
									  <h5> <?php echo $customer_name;?> </h5>
									  <span> <?php echo $customer_designation;?></span> </div>
								  </div>
								</div>
							  </div>
					<?php 
						$counter++;
						endwhile; ?>
				<?php endif; ?>
        </div>
      </div>
    </div>
    <!--listing--> 
    
  </section>
  <!--What Our Clients Say?--> 
  
  <!--partners-->
  <div class="partner-main-wrap">
    <div class="carousel-wrap">
      <div class="owl-carousel partner-carousel">
	       <?php if( have_rows('home_partner_logos') ): ?>
							
					<?php 
					$counter=1;
					while( have_rows('home_partner_logos') ): the_row(); 
						
							$logo = get_sub_field('logo');
							?>
								<div class="item">
								  <div class="partner-logo-wrap" data-aos="zoom-in-down"> <img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['url'];?>" title="<?php echo $logo['url'];?>"> </div>
								</div>
					<?php 
						$counter++;
						endwhile; ?>
				<?php endif; ?>
      
      </div>
    </div>
  </div>
  <!--partners--> 
  <?php 
	$cta_heading = get_field('cta_heading');
	$cta_button_text = get_field('cta_button_text');
	$cta_button_link = get_field('cta_button_link');
	?>
  <!--cta-->
  <div class="cta-main-wraper">
    <div class="container">
      <h2 data-aos="zoom-out-down"> <?php echo $cta_heading;?></h2>
      <div class="btn-cta-wrap"><a href="<?php echo $cta_button_link;?>"> <?php echo $cta_button_text;?> </a></div>
    </div>
  </div>
  <!--cta--> 
  
</section>
<!--content--> 


<?php
get_footer();