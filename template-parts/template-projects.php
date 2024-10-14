<?php 
/* Template Name: Portfolio Template */

get_header();
?>

<?php 
$banner_heading = get_field('banner_heading');
$banner_description = get_field('banner_description');
$cta_heading = get_field('cta_heading');
$cta_button_text = get_field('cta_button_text');
$cta_button_link = get_field('cta_button_link');
?>

<!--header slider-->
<section class="header-slider-wrap portfolio-header-slider-wrap"> 
  <!--slider-->
  <section class="slider-portfolio-wrap">
    <div class="container">
      <div class="heading-text-wrap">
        <div class="d-flex flex-column">
          <div>
            <h1><?php echo wp_kses_post( $banner_heading ); ?></h1>
          </div>
          <div class="col-sm-9 col-md-6">
            <p><?php echo esc_html( $banner_description ); ?></p>
          </div>
        </div>
      </div>
      <div class="filter-project-btns">
        <h2><?php esc_html_e( 'Filter Project by Categories', 'dreamway-media' ); ?></h2>
        <a href="#" id="all-categories" class="active-category"><?php esc_html_e( 'All Categories', 'dreamway-media' ); ?></a>
        <?php
        $taxonomy = 'project_category';
        $terms = get_terms($taxonomy);

        if ($terms) {
            foreach ($terms as $term) {
                $name = esc_html( $term->name );
                $un_name = esc_attr( str_replace(' ', '_', $name) );
                ?>
                <a href="#" id="<?php echo $un_name; ?>"><?php echo $name; ?></a>
                <?php
            }
        }
        ?>
      </div>
    </div>
  </section>
  <!--slider--> 
</section>
<!--header slider--> 

<!--content-->
<section class="content-main-wrap"> 
  <!--portfolio listing-->
  <section class="portfolio-listing-wrap">
    <div class="container">
      <ul class="row projects_ul">
        <?php 
        $args = array(
          'posts_per_page' => -1,
          'order'          => 'DESC',
          'post_type'      => 'projects',
          'post_status'    => 'publish'
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
          $counter = 1;
          while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $terms = wp_get_post_terms($post_id, 'project_category');
            $categories = array();

            foreach ($terms as $term) {
              $name = esc_html( $term->name );
              $un_name = esc_attr( str_replace(' ', '_', $name) );
              $categories[] = $un_name;
            }

            $categories_string = esc_attr( implode(' ', $categories) );
            $thumbnail_url = esc_url( wp_get_attachment_url(get_post_thumbnail_id($post_id)) );
            ?>
            <li class="col-md-4" data-categories="<?php echo $categories_string; ?>">
              <div class="listing-featured-wrap">
                <div class="listing-featured-wrap-image" style="background: url(<?php echo $thumbnail_url; ?>) no-repeat top;"></div>
                <div class="listing-featured-text">
                  <div class="tag-featured-wrap">
                    <?php foreach ($terms as $term) : ?>
                      <span><?php echo esc_html( $term->name ); ?></span>
                    <?php endforeach; ?>
                  </div>
                  <h3><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></h3>
                  <p>
                    <?php
                    $content = wp_strip_all_tags( get_the_content() );
                    $excerpt = wp_trim_words($content, 24, '...');
                    echo esc_html( $excerpt );
                    ?>
                  </p>
                </div>
              </div>
            </li>
            <?php
            $counter++;
          }
        } else {
          echo '<h1 class="page-title screen-reader-text">' . esc_html__( 'No Posts Found', 'dreamway-media' ) . '</h1>';
        }

        wp_reset_postdata();
        ?>
      </ul>
    </div>
  </section>
  <!--portfolio listing--> 
  
  <!--cta-->
  <div class="cta-main-wraper">
    <div class="container">
      <h2 data-aos="fade-up"><?php echo wp_kses_post( $cta_heading ); ?></h2>
      <div class="btn-cta-wrap" data-aos="fade-up">
        <a href="<?php echo esc_url( $cta_button_link ); ?>"><?php echo esc_html( $cta_button_text ); ?></a>
      </div>
    </div>
  </div>
  <!--cta--> 
</section>
<!--content-->

<?php
get_footer();
?>

<script>
jQuery(document).ready(function($) {
    const categoryLinks = $(".filter-project-btns a");
    const projectItems = $(".projects_ul li");

    categoryLinks.on("click", function(e) {
        e.preventDefault();

        categoryLinks.removeClass("active-category");
        $(this).addClass("active-category");

        const categoryID = $(this).attr("id");
        filterProjects(categoryID);
    });

    $("#all-categories").on("click", function(e) {
        e.preventDefault();

        categoryLinks.removeClass("active-category");
        $(this).addClass("active-category");

        projectItems.show();
    });

    function filterProjects(categoryID) {
        projectItems.each(function() {
            const projectCategoryIDs = $(this).data("categories").split(" ");

            if (projectCategoryIDs.includes(categoryID) || categoryID === "all-categories") {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
});
</script>
