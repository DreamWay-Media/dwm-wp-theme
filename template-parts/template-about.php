<?php 
/* Template Name: About Temp */ 

get_header();
?>
 <?php 
	
	$about_banner_description = get_field('about_banner_description');
	$about_banner_image = get_field('about_banner_image');
	$about_connecting_brand_heading = get_field('about_connecting_brand_heading');
	$brand_description = get_field('brand_description');
	?>
<!--header slider-->
<section class="header-slider-wrap inner-header-slider-wrap"> 
  

  <!--slider-->
  <section class="inner-slider-wrap">
    <div class="container">
      <h1> About Us </h1>
      <p> <?php echo $about_banner_description; ?></p>
    </div>
  </section>
  <!--slider--> 
  
</section>
<!--header slider--> 
<!--content-->
<section class="content-main-wrap"> 
  
  <!--about image-->
  <div class="container">
    <section class="inner-slider-image"> <img src="<?php echo $about_banner_image['url']; ?>" alt="<?php echo $about_banner_image['alt']; ?>" title="<?php echo $about_banner_image['title']; ?>"> </section>
  </div>
  <!--about image--> 
  
  <!--Connecting Brands and Audiences-->
  <section class="connect-main-wrap">
    <div class="container"> 
      
      <!--heading-->
      <div class="connect-heading">
        <div class="row"> 
          
          <!--heading-->
          <div class="col-md-6">
            <h2> <?php echo $about_connecting_brand_heading; ?> </h2>
          </div>
          <!--heading-->
          
          <div class="col-md-6">
            <p> <?php echo $brand_description; ?></p>
          </div>
        </div>
      </div>
      <!--heading--> 
      
    </div>
  </section>
  <!--Connecting Brands and Audiences--> 
   <?php 
	
	$founder_image = get_field('founder_image');
	$founder_name = get_field('founder_name');
	$founder_description = get_field('founder_description');
	?>
  <!--owner message-->
  <div class="container">
    <section class="owner-message-wraper">
      <div class="row"> 
        
        <!--owner info-->
        <div class="col-md-6">
          <div class="owner-info-wrap">
            <div class="owner-info-image" style="background:url(<?php echo $founder_image['url']; ?>) no-repeat top;"></div>
            <div class="owner-info-text">
              <h3> <?php echo $founder_name; ?> </h3>
              <span> Founder </span> </div>
          </div>
        </div>
        <!--owner info--> 
        
        <!--owner text-->
        <div class="col-md-6">
          <p> <?php echo $founder_description; ?></p>
        </div>
        <!--owner text--> 
        
      </div>
    </section>
  </div>
  <!--owner message--> 
  
  <!--about sucess-->
  <section class="about-sucess-wrap">
    <div class="container">
      <ul class="row">
	     <?php if( have_rows('success') ): ?>
						
				<?php 
				$counter=1;
				while( have_rows('success') ): the_row(); 
					
						$success_heading = get_sub_field('success_heading');
						$success_count = get_sub_field('success_count');?>
						<li class="col-md-3">
						  <div class="listing-about-sucess"> <span> <?php echo $success_heading; ?></span> <strong> <?php echo $success_count; ?> </strong> </div>
						</li>
		<?php 
					$counter++;
					endwhile; ?>
			<?php endif; ?>
      
      </ul>
    </div>
  </section>
  <!--about sucess--> 
   <?php 
	
	$team_heading = get_field('team_heading');
	$team_members = get_field('team_members');
	$join_team_heading = get_field('join_team_heading');
	$join_team_description = get_field('join_team_description');
	$join_team_button_text = get_field('join_team_button_text');
	$join_team_button_link = get_field('join_team_button_link');
	?>
  <!--team-->
  <section class="team-main-wraper">
    <div class="container">
      <h3> <?php echo $team_heading; ?></h3>
      <ul class="row">
	    <?php if( have_rows('team_members') ): ?>
						
				<?php 
				$counter=1;
				while( have_rows('team_members') ): the_row(); 
					
						$image = get_sub_field('image');
						$name = get_sub_field('name');
						$designation = get_sub_field('designation');
						?>
					
						   <li class="col-md-3 col-6">
							  <div class="team-listing-wraper">
								<div class="team-listing-image" style="background:url(<?php echo $image['url']; ?> ) no-repeat top;"></div>
								<div class="team-listing-text">
								  <h5><?php echo $name; ?> </h5>
								  <span> <?php echo $designation; ?>  </span> </div>
							  </div>
							</li>
		<?php 
					$counter++;
					endwhile; ?>
			<?php endif; ?>
	  
      </ul>
    </div>
  </section>
  <!--team--> 
  
  <!--Join our team-->
  <div class="join-team-wraper">
    <div class="container">
      <div class="join-team-inner">
        <div class="row">
          <div class="col-md-6">
            <h2> <?php echo $join_team_heading; ?></h2>
          </div>
          <div class="col-md-6">
            <div class="join-team-text">
              <p> <?php echo $join_team_description; ?> </p>
              <a href="<?php echo $join_team_button_link; ?>"> <?php echo $join_team_button_text; ?> <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/arrow-team.svg" alt="team"></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Join our team--> 
    <?php 
	
	$about_contact_heading = get_field('about_contact_heading');
	$about_contact_sub_heading = get_field('about_contact_sub_heading');
	?>
  <!--cta-->
  <div class="cta-main-wraper">
    <div class="container">
      <h2 data-aos="zoom-out-down" class="aos-init aos-animate"> <?php echo $about_contact_heading; ?> </h2>
      <p> <?php echo $about_contact_sub_heading; ?></p>
      <?php echo do_shortcode('[contact-form-7 id="b8b65df" title="About US Page"]');?>
	  
    </div>
  </div>
  <!--cta--> 
  
</section>
<!--content--> 

<?php
get_footer();