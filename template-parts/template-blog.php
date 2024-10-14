<?php 
/* Template Name: Blog Temp */ 
get_header();
?>

<!--header slider-->
<section class="header-slider-wrap inner-header-slider-wrap inner-service-wrap">  
  <?php $our_service_banner_description = get_field('our_service_banner_description'); ?>
  <!--slider-->
  <section class="service-slider-wrap">
    <div class="container">
      <h1 id="blog-title">OUR BLOG</h1>
      <p><?php echo apply_filters('the_content', $post->post_content); ?></p>
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
        <!-- Main blog posts -->
        <div class="col-md-6">
          <?php 
          $args_main_posts = [
            'posts_per_page' => 2,
            'offset' => 0,
            'order' => 'ASC',
            'post_type' => 'post',
            'post_status' => 'publish'
          ];
          $main_query = new WP_Query($args_main_posts);

          if ($main_query->have_posts()) {
            while ($main_query->have_posts()) {
              $main_query->the_post();
              $post_id = get_the_ID();
              ?>
              <div class="big-blog-list-wrap">
                <div class="big-blog-list-image">
                  <img src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id($post_id))); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                </div>
                <div class="blog-tag-wrap">
                  <span><?php echo esc_html(get_the_category($post_id)[0]->name); ?></span> 
                  <strong><?php echo esc_html(get_the_date('d-m-Y')); ?></strong>
                  <div class="clearfix"></div>
                </div>
                <h2><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
                <p>
                  <?php
                  $content = strip_tags(get_the_content());
                  $words = explode(' ', $content);
                  $excerpt = implode(' ', array_slice($words, 0, 30));

                  if (count($words) > 30) {
                    $excerpt .= '...';
                  }

                  echo esc_html($excerpt);
                  ?>
                </p>
              </div>
              <?php
            }
          } else {
            echo '<h1 class="page-title screen-reader-text">No Posts Found</h1>';
          }

          wp_reset_postdata();
          ?>
        </div>
        <!-- Secondary blog posts -->
        <div class="col-md-6">
          <div class="small-listing-wrap">
            <ul>
              <?php 
              $args_small_posts = [
                'posts_per_page' => 8,
                'offset' => 2,
                'order' => 'ASC',
                'post_type' => 'post',
                'post_status' => 'publish'
              ];
              $small_query = new WP_Query($args_small_posts);

              if ($small_query->have_posts()) {
                while ($small_query->have_posts()) {
                  $small_query->the_post();
                  $post_id = get_the_ID();
                  ?>
                  <li>
                    <div class="blog-small-list">
                      <div class="blog-small-image" style="background:url(<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id($post_id))); ?>) no-repeat top;"></div>
                      <div class="blog-small-text">
                        <div class="small-tags-rap">
                          <span><?php echo esc_html(get_the_category($post_id)[0]->name); ?></span>
                          <strong><?php echo esc_html(get_the_date('d-m-Y')); ?></strong>
                        </div>
                        <h4><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h4>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </li>
                  <?php
                }
              } else {
                echo '<h1 class="page-title screen-reader-text">No Posts Found</h1>';
              }

              wp_reset_postdata();
              ?>
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
