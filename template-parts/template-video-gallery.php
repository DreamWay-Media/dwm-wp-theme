<?php
/*
 * Template Name: Video Gallery Template
 */

get_header();

// Get ACF fields for banner
$banner_heading     = get_field('banner_heading');
$banner_description = get_field('banner_description');
?>

<section class="header-slider-wrap portfolio-header-slider-wrap">
  <section class="slider-portfolio-wrap">
    <div class="container">
      <div class="heading-text-wrap">
        <div class="row">
          <div class="col-md-6">
            <h1><?php echo wp_kses_post($banner_heading); ?></h1>
          </div>
          <div class="col-md-6">
            <p><?php echo esc_html($banner_description); ?></p>
          </div>
        </div>
      </div>
      <div class="filter-project-btns">
        <h2><?php esc_html_e('Filter Project by Categories', 'dreamway-media'); ?></h2>
        <a href="#" id="all-categories" class="active-category"><?php esc_html_e('All Categories', 'dreamway-media'); ?></a>
        <?php
        // Fetch categories specific to 'video_project_category' taxonomy
        $categories = get_terms([
            'taxonomy'   => 'video_project_category',
            'hide_empty' => false,
        ]);

        if (!empty($categories) && !is_wp_error($categories)) {
            foreach ($categories as $category) {
                echo '<a href="#" id="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</a>';
            }
        }
        ?>
      </div>
    </div>
  </section>
</section>

<section class="content-main-wrap">
  <section class="videos-listing-wrap">
    <div class="container">
      <?php
      // Fetch all Video Projects
      $projects = get_posts([
          'post_type'      => 'video_project',
          'posts_per_page' => -1,
      ]);

      if (!empty($projects)) :
          foreach ($projects as $project) :
              // Fetch the project category for filtering
              $project_categories = wp_get_post_terms($project->ID, 'video_project_category');
              $project_category_slug = !empty($project_categories) ? esc_attr($project_categories[0]->slug) : '';
              $project_category_name = !empty($project_categories) ? esc_html($project_categories[0]->name) : 'Uncategorized';

              // Get the orientation from the project's meta field
              $project_orientation = get_post_meta($project->ID, 'video_orientation', true);
              $orientation_class = ($project_orientation === 'horizontal') ? 'video-horizontal' : 'video-vertical';
              ?>
              <div id="<?php echo sanitize_title($project->post_title); ?>" class="video-project-group <?php echo esc_attr($orientation_class); ?>" data-category="<?php echo esc_attr($project_category_slug); ?>">
                <h2 class="video-project-title"><?php echo esc_html($project->post_title); ?></h2>
                <div class="video-project-category">
                  <span><?php echo $project_category_name; ?></span>
                </div>
                <ul class="videos-grid">
                  <?php
                  // Fetch videos associated with this project
                  $videos = new WP_Query([
                      'post_type'      => 'videos',
                      'posts_per_page' => -1,
                      'meta_query'     => [
                          [
                              'key'   => 'associated_video_project',
                              'value' => $project->ID,
                              'compare' => '='
                          ]
                      ]
                  ]);

                  if ($videos->have_posts()) :
                      while ($videos->have_posts()) :
                          $videos->the_post();
                          $thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id());
                          ?>
                          <li class="videos-item <?php echo esc_attr($orientation_class); ?>">
                          <a href="<?php echo esc_url(add_query_arg('orientation', $orientation_class, get_permalink())); ?>">
                              <div class="videos-thumbnail-image" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');"></div>
                            </a>
                          </li>
                          <?php
                      endwhile;
                  else :
                      echo '<p>No videos found in this project.</p>';
                  endif;
                  wp_reset_postdata();
                  ?>
                </ul>
              </div>
              <?php
          endforeach;
      else :
          echo '<h2>No Projects Found</h2>';
      endif;
      ?>
    </div>
  </section>
</section>

<?php get_footer(); ?>

<script>
jQuery(document).ready(function($) {
    const categoryLinks = $(".filter-project-btns a");
    const projects = $(".video-project-group");

    categoryLinks.on("click", function(e) {
        e.preventDefault();
        const categoryID = $(this).attr("id");

        categoryLinks.removeClass("active-category");
        $(this).addClass("active-category");

        if (categoryID === "all-categories") {
            projects.show();
        } else {
            projects.hide();
            projects.each(function() {
                if ($(this).data("category") === categoryID) {
                    $(this).show();
                }
            });
        }
    });
});
</script>
