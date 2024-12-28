<?php
/**
 * The template for displaying single video posts
 *
 * @package Dreamway_Media
 */

get_header();
?>
<!-- Header Slider -->
<section class="header-slider-wrap inner-header-slider-wrap">
  <?php while (have_posts()) : the_post(); ?>
  <?php $post_id = get_the_ID(); ?>

  <!-- Slider -->
  <section class="blog-single-wrap">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <p>Posted on <?php echo get_the_date(); ?></p>
      <?php 
      $project_id = get_post_meta($post_id, 'associated_video_project', true); 
      if ($project_id): 
          $project_slug = get_post_field('post_name', $project_id);
          $video_gallery_url = home_url('/video-gallery/');
      ?>
        <span><a href="<?php echo esc_url($video_gallery_url . '#' . $project_slug); ?>"><?php echo esc_html(get_the_title($project_id)); ?></a></span>
      <?php endif; ?>
    </div>
  </section>
  <?php endwhile; ?>
</section>

<!-- Content -->
<section class="content-main-wrap">
  <!-- Video Player -->
  <div class="container">
    <div class="blog-image-wrap">
      <?php 
      // Get video orientation from metadata
      $video_orientation = isset($_GET['orientation']) ? sanitize_text_field($_GET['orientation']) : 'video-horizontal';
      $project_id = isset($_GET['project']) ? intval($_GET['project']) : get_post_meta($post_id, 'associated_video_project', true);
      // Use the orientation value as a class
      $orientation_class = $video_orientation;
      ?>
      <div class="video-container <?php echo esc_attr($orientation_class); ?>">
        <?php 
        // Render the video content in the video container
        the_content(); 
        ?>
      </div>
    </div>
  </div>

  <!-- Video Detail -->
  <div class="blog-detail-wrap">
    <div class="container">
      <div class="row">
        <div>
          <div class="blog-detail-wraper">
            <?php echo wp_strip_all_tags(get_the_content()); ?>

            <!-- Related Videos Section -->
            <section class="content-main-wrap">
  <div class="blog-listing-wraper related-wrapper">
    <div class="related-container">
      <h2 class="section-title">More of <?php echo esc_html(get_the_title($project_id)); ?> </h2>
      <ul class="related-videos-grid">
        <?php
        $related_videos = new WP_Query([
          'post_type' => 'videos',
          'posts_per_page' => 3,
          'post__not_in' => [$post_id],
          'meta_query' => [
            [
              'key' => 'associated_video_project',
              'value' => $project_id,
              'compare' => '='
            ]
          ]
        ]);

        if ($related_videos->have_posts()):
          while ($related_videos->have_posts()): $related_videos->the_post(); 
            $related_video_id = get_the_ID();
            $orientation = get_post_meta($related_video_id, 'video_orientation', true); // Retrieve orientation
            $orientation_class = isset($_GET['orientation']) ? sanitize_text_field($_GET['orientation']) : 'video-horizontal';
            $thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id()) ?: get_template_directory_uri() . '/assets/images/default-thumbnail.jpg'; // Fallback thumbnail
            ?>
            <li class="related-video-item <?php echo esc_attr($orientation_class); ?>">
            <a href="<?php echo esc_url(add_query_arg([
    'orientation' => $orientation_class,
    'project' => $project_id,
], get_permalink())); ?>" class="related-video-link">
                <div class="related-thumbnail" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');"></div>
              </a>
            </li>
          <?php 
          endwhile;
          wp_reset_postdata();
        else: ?>
          <p>No related videos found.</p>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</section>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
