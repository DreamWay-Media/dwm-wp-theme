<?php 
/* Template Name: Port  Temp */ 

get_header();
?>
 <?php 
	
	$banner_heading = get_field('banner_heading');
	$banner_description = get_field('banner_description');
	$cta_heading = get_field('cta_heading');
	$cta_button_text = get_field('cta_button_text');
	$cta_button_link = get_field('cta_button_link');?>
<!--header slider-->
<section class="header-slider-wrap portfolio-header-slider-wrap"> 
   
 
  <!--slider-->
  <section class="slider-portfolio-wrap">
    <div class="container">
      <div class="heading-text-wrap">
        <div class="row">
          <div class="col-md-6">
            <h1><?php echo $banner_heading;?>  </h1>
          </div>
          <div class="col-md-6">
            <p> <?php echo $banner_description;?> </p>
          </div>
        </div>
      </div>
      <div class="filter-project-btns">
        <h2>Filter Project by Categories</h2>
        <a href="#" id="all-categories" class="active-category"> All Categories </a>
    <?php
    $taxonomy = 'project_category'; // Replace 'project_category' with your actual taxonomy name.
    $terms = get_terms($taxonomy);

    if ($terms) {
        foreach ($terms as $term) {
       $name =  $term->name;
       $un_name = str_replace(' ', '_', $name);
        ?>
           <a href="#" id="<?php echo $un_name;?>"><?php echo $term->name;?></a>
       <?php 
        }
    }
    ?>

        ?>
          </div>
    </div>
  </section>
  <!--slider--> 
  
</section>
<!--header slider--> 
<!--content-->
<section class="content-main-wrap"> 
  
  <!--profolio listign-->
  <section class="portfolio-listing-wrap">
    <div class="container">
      <ul class="row projects_ul">
	  <?php 
						$args = array (
										'posts_per_page' => -1, /* how many post you need to display */
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
									
                                    $terms = wp_get_post_terms(get_the_ID(), 'project_category');
                                    $categories = array();
                            
                                    foreach ($terms as $term) {
                                        $name =  $term->name;
                                        $un_name = str_replace(' ', '_', $name);
                                        $categories[] = $un_name;
                                    }
                            
                                    // Convert the array of categories to a space-separated string
                                    $categories_string = implode(' ', $categories);
                                    
									//$blog_short_description = get_field('blog_short_description', $post_id);?>
									   <li class="col-md-6" data-categories="<?php echo esc_attr($categories_string); ?>">
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
      <!--<div class="see-more-btn"> <a href="#"> See more projects </a> </div>-->
    </div>
  </section>
  <!--profolio listign--> 
  
  <!--cta-->
  <div class="cta-main-wraper">
    <div class="container">
      <h2 data-aos="zoom-out-down" class="aos-init aos-animate"><?php echo $cta_heading;?>  </h2>
      <div class="btn-cta-wrap aos-init aos-animate" data-aos="fade-up"><a href="<?php echo $cta_button_link;?>"><?php echo $cta_button_text;?></a></div>
    </div>
  </div>
  <!--cta--> 
  
</section>
<!--content--> 

<?php
get_footer();?>

<script>
jQuery(document).ready(function($) {
    const categoryLinks = $(".filter-project-btns a");
    const projectItems = $(".projects_ul li");

    categoryLinks.on("click", function(e) {
        e.preventDefault();

        // Remove the "active" class from all category links
        categoryLinks.removeClass("active-category");

        // Add the "active" class to the clicked category link
        $(this).addClass("active-category");

        // Get the category ID from the clicked link
        const categoryID = $(this).attr("id");

        // Show or hide projects based on the clicked category
        filterProjects(categoryID);
    });

    // Separate click event for "All Categories"
    $("#all-categories").on("click", function(e) {
        e.preventDefault();

        // Remove the "active" class from all category links
        categoryLinks.removeClass("active-category");

        // Add the "active" class to the "All Categories" link
        $(this).addClass("active-category");

        // Show all projects
        projectItems.show();
    });

    // Function to filter projects based on the selected category
    function filterProjects(categoryID) {
        projectItems.each(function() {
            // Get the categories associated with the project as IDs
            const projectCategoryIDs = $(this).data("categories").split(" ");

            // Check if the clicked category ID exists in the project's category IDs
            if (projectCategoryIDs.includes(categoryID) || categoryID === "all-categories") {
                $(this).show(); // Show the project
            } else {
                $(this).hide(); // Hide the project
            }
        });
    }
});



</script>

