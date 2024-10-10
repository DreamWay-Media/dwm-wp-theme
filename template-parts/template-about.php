<?php 
/* Template Name: About Temp */ 
get_header();
?>

<?php
$about_banner_description = get_field('about_banner_description');
$about_banner_image = get_field('about_banner_image');
$about_connecting_brand_heading = get_field('about_connecting_brand_heading');
$brand_description = get_field('brand_description');
$test_string = '<strong>Bold Text</strong> Regular text';
?>

<!--header slider-->
<section class="header-slider-wrap inner-header-slider-wrap">
  <!--slider-->
  <section class="inner-slider-wrap">
    <div class="container">
      <h1>About Us</h1>
      <p><?php echo wp_kses_post($about_banner_description); ?></p>
    </div>
  </section>
  <!--slider-->
</section>
<!--header slider-->

<!--content-->
<section class="content-main-wrap">

  <!--about image-->
  <div class="container">
    <section class="inner-slider-image">
      <img src="<?php echo esc_url($about_banner_image['url']); ?>" alt="<?php echo esc_attr($about_banner_image['alt']); ?>" title="<?php echo esc_attr($about_banner_image['title']); ?>">
    </section>
  </div>
  <!--about image-->
  
  <!--Connecting Brands and Audiences-->
  <section class="connect-main-wrap">
    <div class="container">
      <div class="connect-heading">
        <div class="row">
          <!--heading-->
          <div class="col-md-6">
            <h2><?php echo esc_html($about_connecting_brand_heading); ?></h2>
          </div>
          <div class="col-md-6">
            <p><?php echo wp_kses_post($brand_description); ?></p>
          </div>
        </div>
      </div>
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
            <div class="owner-info-image" style="background:url(<?php echo esc_url($founder_image['url']); ?>) no-repeat top;"></div>
            <div class="owner-info-text">
              <h3><?php echo esc_html($founder_name); ?></h3>
              <span>Founder</span>
            </div>
          </div>
        </div>
        <!--owner info--> 
        
        <!--owner text-->
        <div class="col-md-6">
          <p><?php echo esc_html($founder_description); ?></p>
        </div>
        <!--owner text--> 
      </div>
    </section>
  </div>
  <!--owner message-->

  <!-- Meet the Team -->
<?php 
$intro = get_field('meet_the_team');
$args = array(
    'post_type' => 'meet-the-team',
    'posts_per_page' => -1,
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <div class="container">
        <h2 class="team-intro"><?php echo esc_html($intro); ?></h2>
        <div class="team-all row">
            <?php 
            // Loop through custom post type: Team
            while ($query->have_posts()) : $query->the_post();
                // Gather custom fields to display
                $intro = get_field('meet_the_team');
                $image = get_field('team_member_image');
                $image_url = esc_url($image['url']);
                $image_alt = esc_attr($image['alt']);
                $name = get_field('team_member_name');
                $title = get_field('team_member_title');
            ?>
                <div class="team-member col-sm-4 col-md-3">
                    <?php if ($image) : ?>
                        <img class="about-team-image" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" />
                    <?php else : ?>
                        <p>No photo available</p>
                    <?php endif; ?>
                    <h4 class="about-team-name"><?php echo esc_html($name); ?></h4>
                    <p class="about-team-title"><?php echo esc_html($title); ?></p>
                </div> <!-- Closes team-member div -->
            <?php endwhile; ?>
        </div> <!-- Closes team-all div -->
    </div> <!-- Closes container div -->
    <?php wp_reset_postdata(); // Reset the post data ?>
<?php else : ?>
    <p>No posts found.</p>
<?php endif; ?>
<!-- Meet the Team -->


  <?php 
  $team_heading = get_field('team_heading');
  $team_members = get_field('team_members');
  $join_team_heading = get_field('join_team_heading');
  $join_team_description = get_field('join_team_description');
  $join_team_button_text = get_field('join_team_button_text');
  $join_team_button_link = get_field('join_team_button_link');
  $about_contact_heading = get_field('about_contact_heading');
  $about_contact_sub_heading = get_field('about_contact_sub_heading');
  ?>

  <!--cta-->
  <div class="cta-main-wraper">
    <div class="container">
      <h2 data-aos="fade-up" class="aos-init aos-animate"><?php echo esc_html($about_contact_heading); ?></h2>
      <p><?php echo wp_kses_post($about_contact_sub_heading); ?></p>
      <?php echo do_shortcode('[contact-form-7 id="b8b65df" title="About US Page"]'); ?>
    </div>
  </div>
  <!--cta--> 

</section>
<!--content--> 

<?php
get_footer();
