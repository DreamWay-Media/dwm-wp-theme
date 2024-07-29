<?php 
/* Template Name: Services Temp */ 

get_header();
?>
<!--header slider-->
<section class="header-slider-wrap inner-header-slider-wrap inner-service-wrap"> 
  
 <?php 
	
	$our_service_banner_description = get_field('our_service_banner_description');
	
	?>
  <!--slider-->
  <section class="service-slider-wrap">
    <div class="container">
      <h1> OUR Services </h1>
      <p> <?php echo $our_service_banner_description; ?></p>
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
      <ul>
	  <?php if( have_rows('our_services') ): ?>
						
				<?php 
				$counter=1;
				while( have_rows('our_services') ): the_row(); 
					
						$service_heading = get_sub_field('service_heading');
						$service_description = get_sub_field('service_description');
						$service_image = get_sub_field('service_image');?>
						    <li>
							  <div class="service-list-wrap" id="<?php echo $input = preg_replace("/[^a-zA-Z]+/", "", $service_heading);?>">
								<div class="row">
								  <div class="col-md-6">
									<div class="listing-service-wrap">0<?php echo $counter?></div>
									<h3> <?php echo $service_heading?> </h3>
								  </div>
								  <div class="col-md-6">
									<div class="listing-text-wrap">
									  <p> <?php echo $service_description?> </p>
									</div>
								  </div>
								  <div class="col-md-12">
									<div class="service-inner-image"> <img class="image-blur" src="<?php echo $service_image['url'];?>" alt="<?php echo $service_image['alt'];?>" title="<?php echo $service_image['alt'];?>"> </div>
								  </div>
								  <div class="col-md-12">
									<div class="service-list-info">
									   <?php if( have_rows('service_features') ): ?>
										<ul class="row">
											<?php 
											while( have_rows('service_features') ): the_row(); 
												
													$feature_image = get_sub_field('feature_image');
													$feature_title = get_sub_field('feature_title');
													$feature_description = get_sub_field('feature_description');?>
														<li class="col-md-6">
														  <div class="inner-list-service">
															<h5> <img src="<?php echo $feature_image['url'];?>" alt="<?php echo $feature_image['alt'];?>" title="<?php echo $feature_image['title'];?>"> <?php echo $feature_title?></h5>
															<p> <?php echo $feature_description?></p>
														  </div>
														</li>
											<?php 
											endwhile; ?>
											<?php endif; ?>
									  </ul>
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


<?php
get_footer();