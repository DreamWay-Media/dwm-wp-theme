<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dreamway_Media
 */

get_header();
?>
<!--header slider-->
<!--header slider-->
<section class="header-slider-wrap inner-header-slider-wrap"> 
 	<?php
		while ( have_posts() ) :
			the_post();
			$post_id = get_the_ID();
			
			$website_link = get_field('website_link',$post_id);
			
			?>
  <!--slider-->
  <section class="portfolio-slider-wrap">
    <div class="container">
      <h1> <?php the_title(); ?> </h1>
			<p> 			<?php
				  $content = get_the_content();
					$excerpt = strip_tags($content);
					$words = explode(' ', $excerpt);
					$excerpt = implode(' ', array_slice($words, 0, 24));
					// Add "..." at the end if the content is longer than the specified substring length (24 words in this case)
					if (count($words) > 24) {
						$excerpt .= '...';
					}

					echo $excerpt;
				  ?>
			</p>
				<div class="single-portfolio-list"> 
					<?php $terms = wp_get_post_terms( $post_id, array( 'project_category' ) ); ?>
						<?php foreach ( $terms as $term ) : ?>
						<span><?php echo $term->name; ?></span>
						<?php endforeach; ?>
				</div>
      <div class="button-portfolio"> 
	  <a href="<?php echo $website_link;?>" target="_blank"> Visit Webite <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/arrow-portfolio.svg" alt="arrow"></a> 
	  </div>
    </div>
  </section>
  <!--slider--> 
  
</section>
<!--header slider--> 
<!--content-->
<section class="content-main-wrap"> 
  
  <!--slider image-->
  <div class="container">
    <div class="slider-image-wrap"> <img src="<?php echo  wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()))?>" alt="<?php the_title(); ?> "> </div>
  </div>
  <!--slider image--> 
  <?php 
		$info_headings = get_field('info_headings',$post_id);
		$info_gallery = get_field('info_gallery',$post_id);
		$info_complete_left_texts = get_field('info_complete_left_texts',$post_id);
			
			
	?>
  <!--What They Need-->
  <div class="what-they-need-wrap">
    <div class="container">
      <h3>  <?php echo $info_headings;?></h3>
      <div class="product-slider-text">
        <div class="row"> 
          
          <!--image-->
          <div class="col-md-6">
            <div class="product-image-wrap">
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <?php 
					$info_gallery = get_field('info_gallery',$post_id);
					if( $info_gallery ): ?>
						
							<?php 
							$counter=1;
							foreach( $info_gallery as $image ): ?>
								
								<div class="carousel-item <?php if($counter==1){ echo 'active';}?>">
									<div class="product-image-wrap"> <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>" title="<?php echo esc_url($image['title']); ?>"> </div>
								</div>
								
							<?php 
							$counter++;
							endforeach; ?>
					
					<?php endif; ?>
				  
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="visually-hidden">Previous</span> </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="visually-hidden">Next</span> </button>
              </div>
            </div>
          </div>
          <!--image--> 
          
          <!--text-->
          <div class="col-md-6">
            <div class="product-detail-text">
             <?php echo $info_complete_left_texts;?>
			</div>
          
          </div>
          <!--text--> 
          
        </div>
      </div>
    </div>
  </div>
  <!--What They Need--> 
   <?php 
		$second_section_heading = get_field('second_section_heading',$post_id);
		$second_section_description = get_field('second_section_description',$post_id);
		$second_section_images = get_field('second_section_images',$post_id);
			
	if($second_section_heading || $second_section_description){		
	?>
  <!--logo design-->
  <section class="logo-design-wrap">
    <div class="container"> 
      
      <!--heading, text-->
      <div class="logo-heading-text-wrap">
        <div class="row"> 
          
          <!--heading-->
          <div class="col-md-6">
            <h4> <?php echo $second_section_heading;?> </h4>
          </div>
          <!--heading--> 
          
          <!--text-->
          <div class="col-md-6">
            <p><?php echo $second_section_description;?> </p>
          </div>
          <!--text--> 
          
        </div>
      </div>
      <!--heading, text--> 
      
      <!--logo image-->
      <div class="logo-image-wrap">
        <ul class="row">
			<?php if( have_rows('second_section_images') ): ?>
						
				<?php 
				$counter=1;
				while( have_rows('second_section_images') ): the_row(); 
					
						$image = get_sub_field('image');?>
						  <li class="col-md-6">
							<div class="logo-image-portfolio"> <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>"> </div>
						  </li>
			<?php 
					$counter++;
					endwhile; ?>
			<?php endif; ?>
        </ul>
      </div>
      <!--logo image--> 
      
    </div>
  </section>
  <!--logo design--> 
  <?php 
  }
  
		$third_section_heading = get_field('third_section_heading',$post_id);
		$third_section_description = get_field('third_section_description',$post_id);
		$third_section_button_text = get_field('third_section_button_text',$post_id);
		$third_section_button_link = get_field('third_section_button_link',$post_id);
		$third_section_image = get_field('third_section_image',$post_id);		
	
		if($third_section_heading || $third_section_description){		
	?>
  <!--Website Design & Development-->
  <section class="design-development-wrap">
    <div class="container">
      <div class="row"> 
        
        <!--heading-->
        <div class="col-md-6">
          <div class="heading-text-wrap">
            <h3> <?php echo $third_section_heading;?> </h3>
            <p> <?php echo $third_section_description;?></p>
             <?php if($third_section_button_link){?>
            <div class="btn-website-wrap"> <a href="<?php echo $third_section_button_link;?>"> <?php echo $third_section_button_text;?><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/arrow-website.svg" alt="arrow"> </a> </div>
          <?php } ?>
          </div>
        </div>
        <!--heading--> 
        
        <!--image-->
        <div class="col-md-6">
            <?php if($third_section_image){?>
          <div class="design-image-wrap"> <img src="<?php echo $third_section_image['url']?>" alt="<?php echo $third_section_image['alt']?>"> </div>
          <?php } ?>
        </div>
        <!--image--> 
        
      </div>
    </div>
  </section>
  <?php } ?>
  <!--Website Design & Development--> 
  <?php 
		$video_heading = get_field('video_heading',$post_id);
		$video_description = get_field('video_description',$post_id);
		$intro_video_heading = get_field('intro_video_heading',$post_id);
		$videos = get_field('videos',$post_id);
		$brand_section_heading = get_field('brand_section_heading',$post_id);		
		$brand_section_video_iframe = get_field('brand_section_video_iframe',$post_id);		
	
	if($video_heading || $video_description){ ?>	
  <!--Video Production-->
  <div class="video-production-wraper">
    <div class="container"> 
      
      <!--text-->
      <div class="video-production-wrap">
        <h3> <?php echo $video_heading;?></h3>
        <p> <?php echo $video_description;?></p></div>
      <!--text--> 
      
      <!--Projects-->
      <div class="project-video-wrap">
        <h5> Projects </h5>
        <h3> <?php echo $intro_video_heading;?> </h3>
        <ul class="row">
			<?php if( have_rows('videos') ): ?>
						
				<?php 
				$counter=1;
				while( have_rows('videos') ): the_row(); 
					
						$video_ifram = get_sub_field('video_ifram');?>
						  <li class="col-md-6">
							<div class="listing-project-wrp"> <?php echo $video_ifram;?> </div>
						  </li>
			<?php 
					$counter++;
					endwhile; ?>
			<?php endif; ?>
          
        </ul>
      </div>
      <!--Projects--> 
      
      <!--UNIQXO’S BRAND PROMISE-->
      <div class="brand-video-wraper">
        <h3> <?php echo $brand_section_heading;?></h3>
        <div class="big-video-image"> <?php echo $brand_section_video_iframe;?> </div>
      </div>
    </div>
    <!--UNIQXO’S BRAND PROMISE--> 
    
  </div>
  <!--Video Production--> 
  <?php } ?>
   <?php 
		$product_heading = get_field('product_heading',$post_id);
		$product_description = get_field('product_description',$post_id);
	
	if($product_heading || $product_description){ ?>	
  <!--Product Design-->
  <div class="product-design-wraper">
    <div class="container">
      <h4> <?php echo $product_heading;?> </h4>
      <p> <?php echo $product_description;?></p>
      <ul class="row">
	  <?php if( have_rows('products_images') ): ?>
						
				<?php 
				$counter=1;
				while( have_rows('products_images') ): the_row(); 
					
						$image = get_sub_field('image');?>
						    <li class="col-md-4">
							  <div class="listing-design-wrap">
								<div class="listing-design-image"><img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>"></div>
							  </div>
							</li>
			<?php 
					$counter++;
					endwhile; ?>
			<?php endif; ?>
      
      </ul>
    </div>
  </div>
  <!--Product Design-->
  <?php } ?>
   <?php 
		$cta_heading = get_field('cta_heading',$post_id);
		$cta_button_text = get_field('cta_button_text',$post_id);
		$cta_button_link = get_field('cta_button_link',$post_id);
		?>
  <!--cta-->
  <div class="cta-main-wraper">
    <div class="container">
      <h2 data-aos="fade-up" class="aos-init aos-animate"> <?php echo $cta_heading;?> </h2>
      <div class="btn-cta-wrap aos-init aos-animate" data-aos="fade-up"><a href="<?php echo $cta_button_link;?> "><?php echo $cta_button_text;?> </a></div>
    </div>
  </div>
  <!--cta--> 
  
</section>
<!--content-->  
	
<?php 
		endwhile; // End of the loop.
		?>

<?php
//get_sidebar();
get_footer();
