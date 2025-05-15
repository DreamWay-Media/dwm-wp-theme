<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dreamway_Media
 */

get_header();
// Include Font Awesome stylesheet
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
?>

<!--header slider-->
<section class="header-slider-wrap inner-header-slider-wrap inner-service-wrap" style="padding: 40px 0;">  
  <!--slider-->
  <section class="service-slider-wrap">
    <div class="container">
      <h1 id="blog-title" style="font-size: 4rem;"><?php 
        $title = get_the_archive_title();
        $title = preg_replace('/^Category: /', '', $title);
        echo $title;
      ?></h1>
      <?php the_archive_description('<p>', '</p>'); ?>
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
        <?php
        // Get total posts count for current category
        $current_cat = get_query_var('cat');
        $total_posts = get_posts([
          'cat' => $current_cat,
          'post_type' => 'post',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'fields' => 'ids'
        ]);
        $total_posts = count($total_posts);

        if ($total_posts <= 2) {
          // If only 2 or fewer posts, display them side by side
          $args_main_posts = [
            'posts_per_page' => 2,
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish',
            'cat' => $current_cat
          ];
          $main_query = new WP_Query($args_main_posts);

          if ($main_query->have_posts()) {
            while ($main_query->have_posts()) {
              $main_query->the_post();
              $post_id = get_the_ID();
              ?>
              <div class="col-md-6">
                <a href="<?php echo esc_url(get_the_permalink()); ?>">
                  <div class="big-blog-list-wrap">
                    <div class="big-blog-list-image">
                      <img src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id($post_id))); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                    </div>
                    <div class="blog-tag-wrap">
                      <span><?php echo esc_html(get_the_category($post_id)[0]->name); ?></span> 
                      <strong><?php echo esc_html(get_the_date('d-m-Y')); ?></strong>
                      <div class="clearfix"></div>
                    </div>
                    <h2><?php the_title(); ?></h2>
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
                </a>
              </div>
              <?php
            }
          }
          wp_reset_postdata();
        } else {
          // Original layout for more than 2 posts
          ?>
          <!-- Main blog posts -->
          <div class="col-md-6">
            <?php 
            // Get the current page number
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $main_offset = ($paged - 1) * 10; // Adjust for pagination
            // Set up the query for main blog posts
            $args_main_posts = [
              'posts_per_page' => 2, // Number of main blog posts to display
              'offset' => $main_offset,
              'order' => 'DESC',
              'post_type' => 'post',
              'post_status' => 'publish',
              'cat' => $current_cat
            ];
            $main_query = new WP_Query($args_main_posts);

            if ($main_query->have_posts()) {
              while ($main_query->have_posts()) {
                $main_query->the_post();
                $post_id = get_the_ID();
                ?>
                <a href="<?php echo esc_url(get_the_permalink()); ?>">
                  <div class="big-blog-list-wrap">
                    <div class="big-blog-list-image">
                      <img src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id($post_id))); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                    </div>
                    <div class="blog-tag-wrap">
                      <span><?php echo esc_html(get_the_category($post_id)[0]->name); ?></span> 
                      <strong><?php echo esc_html(get_the_date('d-m-Y')); ?></strong>
                      <div class="clearfix"></div>
                    </div>
                    <h2><?php the_title(); ?></h2>
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
                </a>    
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
                $small_offset = ($paged - 1) * 10 + 2; // Start after main posts 
                $args_small_posts = [
                  'posts_per_page' => 8,
                  'offset' => $small_offset,
                  'paged' => $paged,
                  'order' => 'DESC',
                  'post_type' => 'post',
                  'post_status' => 'publish',
                  'cat' => $current_cat
                ];
                $small_query = new WP_Query($args_small_posts);

                if ($small_query->have_posts()) {
                  while ($small_query->have_posts()) {
                    $small_query->the_post();
                    $post_id = get_the_ID();
                    ?>
                    <li>
                      <a href="<?php echo esc_url(get_the_permalink()); ?>">
                        <div class="blog-small-list">
                          <div class="blog-small-image" style="background:url(<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id($post_id))); ?>) no-repeat top;"></div>
                          <div class="blog-small-text">
                            <div class="small-tags-rap">
                              <span><?php echo esc_html(get_the_category($post_id)[0]->name); ?></span>
                              <strong><?php echo esc_html(get_the_date('d-m-Y')); ?></strong>
                            </div>
                            <h4><?php the_title(); ?></h4>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </a>  
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
          <?php
        }
        ?>
        <div class="row">
          <!-- Pagination Links -->
          <div class="pagination">
            <?php
            // Pagination logic
            $big = 999999999; // An unlikely integer to serve as a placeholder
            $total_pages = ceil($total_posts / 10);
            $current_page = max(1, get_query_var('paged'));

            // Only show pagination if there's more than one page
            if ($total_pages > 1) {
              // Previous Arrow – always visible
              if ($current_page > 1) {
                $prev_link = '<a class="pagination-prev" href="' . esc_url(get_pagenum_link($current_page - 1)) . '">
                            <i class="fa-solid fa-arrow-left"></i>
                          </a>';
              } else {
                // On the first page, the arrow as a disabled span
                $prev_link = '<span class="pagination-prev disabled">
                            <i class="fa-solid fa-arrow-left"></i>
                          </span>';
              }

              // Next Arrow – always visible
              if ($current_page < $total_pages) {
                $next_link = '<a class="pagination-next" href="' . esc_url(get_pagenum_link($current_page + 1)) . '">
                            <i class="fa-solid fa-arrow-right"></i>
                          </a>';
              } else {
                // On the last page, outputs the arrow as a disabled span
                $next_link = '<span class="pagination-next disabled">
                            <i class="fa-solid fa-arrow-right"></i>
                          </span>';
              }

              // numbered pagination links (excluding previous/next arrows)
              $pagination_links = paginate_links([
                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'    => '?paged=%#%',
                'current'   => $current_page,
                'total'     => $total_pages,
                'type'      => 'array',
                'prev_next' => false, // Disables - the default previous and next links
              ]);

              if ($pagination_links) {
                echo '<div class="custom-pagination">';
                // Outputs the custom previous arrow
                echo $prev_link;

                // Outputs each of the numbered page links
                foreach ($pagination_links as $link) {
                  echo '<span class="pagination-link">' . $link . '</span>';
                }
                // Outputs the custom next arrow
                echo $next_link;
                echo '</div>';
              }
            }
            ?>
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
