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
<section class="about-main-wrap"> 
  
  <!--about-->
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<div class="container bootstrap snippets bootdey " data-aos="fade-up">
<section id="services" class="current">
    <div class="services-top">
        <div class="container bootstrap snippets bootdey">
            <div class="row text-center">
                <div class="col-sm-12 col-md-12 col-md-12">
                    <h2>What We Offer</h2>
                    <h2 style="font-size: 60px;line-height: 60px;margin-bottom: 20px;font-weight: 900;">What you really need</h2>
                    <p>We offer wider range of services to ensure you get what you need, all under one roof.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-sm-12 col-md-12 col-md-10">
                    <div class="services-list">
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-magic highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Graphic Design</div>
                                        <div class="info">Beauty and function</div>
                                        <div class="text">Branding & Identity Design, Logo Design, Web Design, Product Design, Packaging Design, Thumbnails, Infographics, Amazon A+ </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-code highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Development/Coding</div>
                                        <div class="info">Quality code that lasts</div>
                                        <div class="text">Shopify, WordPress, Magento, WooCommerce, Hydrogen, Gatsby, Etc</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-pencil highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Content Creation</div>
                                        <div class="info">Words that tell your story</div>
                                        <div class="text">Copywriting, Product Meta Content, Website Text Content, Scriptwriting, Ghostwriting</div>
                                    </div>
                                </div>
                            </div>
							<div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-camera highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Photograpphy</div>
                                        <div class="info">High-quality images of your products & services</div>
                                        <div class="text">Product Photography, Portrairs, Headshots, Events, Landscape, Realestate </div>
                                    </div>
                                </div>
                            </div>
							<div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-film highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Motion Graphics</div>
                                        <div class="info">Create engaging motion graphics to captivate and capture audiances attention</div>
                                        <div class="text">Animations, Special Effects</div>
                                    </div>
                                </div>
							</div>
							<div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-video-camera highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Video Production</div>
                                        <div class="info">Professional videos that tells your brand story and helps with your sales</div>
                                        <div class="text">Filming on Location, Video Editing, Casting, Sound Design, UGC</div>
                                    </div>
                                </div>
							</div>
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-bullhorn highlight"></div>
                                    <div class="text-block">
                                        <div class="name">Web Marketing</div>
                                        <div class="info">Converting users to customers</div>
                                        <div class="text">SMM (Social Media Managment), SEO (Search Engine Optimizartion), PPC (Pay Per Click), Email Markting</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-md-4">
                                <div class="service-block" style="visibility: visible;">
                                    <div class="ico fa fa-shopping-cart highlight"></div>
                                    <div class="text-block">
                                        <div class="name">E-commerce</div>
                                        <div class="info">Helping you run your shop</div>
                                        <div class="text">E-commerce Management, Product Management, System Administration, Shipping & Fulfilment</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-md-4">
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
       <style>                 
#services {}
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
} </style>
</div>  
  <!--about-->	
<!--content-->
<section class="content-main-wrap"> 
  
  
  
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
										'order' => 'DESC',
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
										  <div class="listing-featured-wrap" data-aos="fade-up">
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