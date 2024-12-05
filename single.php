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
<!-- Header Slider -->
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<section class="header-slider-wrap inner-header-slider-wrap">
  <?php while ( have_posts() ) : the_post(); ?>
  <?php $post_id = get_the_ID(); ?>

  <!-- Slider -->
  <section class="blog-single-wrap">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <p>Posted on <?php the_date(); ?></p>
      <span><?php echo esc_html(get_the_category($post_id)[0]->name); ?></span>
    </div>
  </section>
  <?php endwhile; ?>
</section>

<!-- Content -->
<section class="content-main-wrap">
  <!-- Blog Image -->
  <div class="container">
    <div class="blog-image-wrap">
      <img src="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id($post_id))); ?>" alt="<?php the_title(); ?>">
    </div>
  </div>

  <!-- Blog Detail -->
  <div class="blog-detail-wrap">
    <div class="container">
      <div class="row">
        <!-- Detail -->
        <div>
          <div class="blog-detail-wraper">
            <?php the_content(); ?>

            <!-- Related Posts Section -->
            <section class="content-main-wrap">
              <div class="blog-listing-wraper related-wrapper">
                <div class="related-container">
                  <h2>Related Posts</h3>
                  <div class="row">
                    <?php
                    // Get categories of the current post
                    $categories = wp_get_post_terms($post_id, 'category', array('fields' => 'ids'));

                    if ($categories) {
                      // Query for related posts in the same categories
                      $related_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3, // Limit to 3 related posts
                        'post__not_in' => array($post_id), // Exclude the current post
                        'category__in' => $categories,
                        'orderby' => 'date', // Order by date
                        'order' => 'DESC' // Most recent first
                      );

                      $related_query = new WP_Query($related_args);

                      if ($related_query->have_posts()) :
                        while ($related_query->have_posts()) : $related_query->the_post();
                          $related_post_id = get_the_ID();
                          ?>
                          <div class="col-md-4">
                            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                              <div class="big-blog-list-wrap big-related-list-wrap">
                                <div class="featured-blog-image" style="background: url(<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id($related_post_id))); ?>) no-repeat center / cover;"></div>
                                <div class="featured-blog-text">
                        <h3 class="featured-blog-title related-blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p id="related-text">
                          <?php
                          $content = strip_tags(get_the_content());
                          $words = explode(' ', $content);
                          $excerpt = implode(' ', array_slice($words, 0, 15));
                          if (count($words) > 15) {
                              $excerpt .= '<br><a class="read-more-btn" href="' . esc_url(get_permalink()) . '">Read More <i class=\'fa fa-angle-right\'></i></a>';
                          }
                          echo $excerpt;
                          ?>
                        </p>
                      </div>
                              </div>
                            </a>    
                          </div>
                          <?php
                        endwhile;

                        wp_reset_postdata();
                      else :
                        echo '<p>No related posts found.</p>';
                      endif;
                    }
                    ?>
                  </div>
                </div>
              </div>
            </section>

            <!-- Share This Post -->
            <div class="Share-this-post-wrap">
              <h5>Share this post</h5>
              <div id="shareButtons">
                <a href="<?php echo esc_url(get_the_permalink()); ?>" id="twitterLink">
                  <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/twiiter.svg'); ?>" alt="twitter"> Share on Twitter
                </a>
                <span class="copyMessage" id="twitterMessage">Copied</span>

                <a href="<?php echo esc_url(get_the_permalink()); ?>" id="facebookLink">
                  <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/facebook.svg'); ?>" alt="facebook"> Share on Facebook
                </a>
                <span class="copyMessage" id="facebookMessage">Copied</span>

                <a href="<?php echo esc_url(get_the_permalink()); ?>" id="linkedInLink">
                  <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/linked.svg'); ?>" alt="linkedin"> Share on LinkedIn
                </a>
                <span class="copyMessage" id="linkedInMessage">Copied</span>
              </div>
            </div>

            <!-- Comment Section -->
            <div class="leave-comment-wrap bg-light p-4 rounded shadow mt-3 mt-lg-5">
              <?php if (comments_open() || get_comments_number()) : ?>
                  <?php 
                  $comment_form_args = array(
                      'fields' => array(
                          'author' => '<div class="form-group mb-3"><label for="author" class="form-label">Name *</label> ' .
                                      '<input id="author" name="author" type="text" class="form-control" value="" size="30" /></div>',
                          'email'  => '<div class="form-group mb-3"><label for="email" class="form-label">Email *</label> ' .
                                      '<input id="email" name="email" type="email" class="form-control" value="" size="30" /></div>',
                          'url'    => '<div class="form-group mb-3"><label for="url" class="form-label">Website</label> ' .
                                      '<input id="url" name="url" type="url" class="form-control" value="" size="30" /></div>',
                      ),
                      'comment_field' => '<div class="form-group mb-3"><label for="comment" class="form-label">Comment *</label> ' .
                                        '<textarea id="comment" name="comment" class="form-control" rows="5" aria-required="true"></textarea></div>',
                      'submit_button' => '<button type="submit" class="btn btn-primary">Post Comment</button>',
                      'comment_notes_before' => '<p class="form-text text-muted mb-3">Your email address will not be published. Required fields are marked *</p>',
                  );

                  comment_form($comment_form_args);
                  ?>
              <?php endif; ?>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>

<script>
// Function to copy a given text to the clipboard
function copyTextToClipboard(text) {
  const textArea = document.createElement("textarea");
  textArea.value = text;
  document.body.appendChild(textArea);
  textArea.select();
  document.execCommand("copy");
  document.body.removeChild(textArea);
}

// Function to show and hide a message element
function showMessage(messageElement) {
  messageElement.classList.add("show");
  setTimeout(() => {
    messageElement.classList.remove("show");
  }, 2000); // Hide the message after 2 seconds
}

// Get the share buttons and messages containers
const twitterButton = document.getElementById("twitterLink");
const facebookButton = document.getElementById("facebookLink");
const linkedInButton = document.getElementById("linkedInLink");

const twitterMessage = document.getElementById("twitterMessage");
const facebookMessage = document.getElementById("facebookMessage");
const linkedInMessage = document.getElementById("linkedInMessage");

// Add click event listeners to each button
twitterButton.addEventListener("click", function (event) {
  event.preventDefault();
  copyTextToClipboard(twitterButton.getAttribute("href"));
  showMessage(twitterMessage);
});

facebookButton.addEventListener("click", function (event) {
  event.preventDefault();
  copyTextToClipboard(facebookButton.getAttribute("href"));
  showMessage(facebookMessage);
});

linkedInButton.addEventListener("click", function (event) {
  event.preventDefault();
  copyTextToClipboard(linkedInButton.getAttribute("href"));
  showMessage(linkedInMessage);
});
</script>
