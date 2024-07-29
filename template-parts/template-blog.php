<?php 
/* Template Name: Blog Temp */ 

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
      <h1> OUR BLOG </h1>
      <p> <?php echo apply_filters('the_content', $post->post_content); ?> </p>
    </div>
  </section>
  <!--slider--> 
  
</section>
<!--header slider--> 
<!--content-->
<section class="content-main-wrap"> 
  
  <!--blog-->
  <div class="blog-listing-wraper">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
		<?php 
				$args = array (
								'posts_per_page' => 2, /* how many post you need to display */
								'offset' => 0,
								'order' => 'ASC',
								'post_type' => 'post', /* your post type name */
								'post_status' => 'publish'
							);
				$query = new WP_Query( $args );
				// The Loop
				if ( $query->have_posts() ) {
					$counter=0;
					while ( $query->have_posts() ) {
							$query->the_post();
							$post_id = get_the_ID();
							//$blog_short_description = get_field('blog_short_description', $post_id);?>
							<div class="big-blog-list-wrap">
								<div class="big-blog-list-image"><img src="<?php echo  wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()))?>" alt="<?php the_title()?>" title="<?php the_title()?>"></div>
								<div class="blog-tag-wrap"> <span> <?php echo get_the_category( $post_id )[0]->name;?></span> <strong> <?php echo get_the_date( 'd-m-Y' ); ?></strong>
								  <div class="clearfix"></div>
								</div>
								<h2> <a href="<?php echo get_the_permalink() ?>"> <?php the_title()?></a> </h2>
								<p> <?php
										  $content = get_the_content();
											$excerpt = strip_tags($content);
											$words = explode(' ', $excerpt);
											$excerpt = implode(' ', array_slice($words, 0, 30));
											// Add "..." at the end if the content is longer than the specified substring length (24 words in this case)
											if (count($words) > 30) {
												$excerpt .= '...';
											}

											echo $excerpt;
										  ?> </p>
							  </div>
				<?php 
				$counter++;
					}
				} else {
					// no posts found
					echo '<h1 class="page-title screen-reader-text">No Posts Found</h1>';
				}
				// Restore original Post Data
				wp_reset_postdata();?>
         
        </div>
        <div class="col-md-6">
          <div class="small-listing-wrap">
            <ul>
			<?php 
				$args = array (
								'posts_per_page' => 8, /* how many post you need to display */
								'offset' => 2,
								'order' => 'ASC',
								'post_type' => 'post', /* your post type name */
								'post_status' => 'publish'
							);
				$query = new WP_Query( $args );
				// The Loop
				if ( $query->have_posts() ) {
					$counter=0;
					while ( $query->have_posts() ) {
							$query->the_post();
							$post_id = get_the_ID();
							//$blog_short_description = get_field('blog_short_description', $post_id);?>
							
								<li>
									<div class="blog-small-list">
									  <div class="blog-small-image" style=" background:url(<?php echo  wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()))?>) no-repeat top;"></div>
									  <div class="blog-small-text">
										<div class="small-tags-rap"> <span> <?php echo get_the_category( $post_id )[0]->name;?></span> <strong> <?php echo get_the_date( 'd-m-Y' ); ?> </strong> </div>
										<h4> <a href="<?php echo get_the_permalink() ?>"> <?php the_title()?> </a></h4>
									  </div>
									  <div class="clearfix"></div>
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
        </div>
      </div>
    </div>
  </div>
  <!--blog--> 
  
</section>
<!--content--> 
<?php
get_footer();