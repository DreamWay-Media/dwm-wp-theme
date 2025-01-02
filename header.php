<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dreamway_Media
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--CSS -->
    <link href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/css/aos.css'); ?>" rel="stylesheet">
    <link href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!--header-->
    <header class="header-main-wrap">
        <div class="container">
            <div class="row"> 
                <!--logo-->
                <div class="col-md-4">
                    <div class="site-logo"> 
                        <a href="<?php echo esc_url(site_url()); ?>">
                            <img src="<?php echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]); ?>" class="custom-logo" alt="Dreamway Media" decoding="async">
                        </a>
                    </div>
                </div>
                <!--logo-->

                <!--nav-->
                <div class="col-md-8">
                    <div class="header-nav-wrap">
                        <?php
                        $menuitems = wp_get_nav_menu_items(2, array('order' => 'DESC'));
                        if ($menuitems) : ?>
                            <ul>
                                <?php
                                $count = 0;
                                $submenu = false;

                                foreach ($menuitems as $item) :
                                    $link = esc_url($item->url);
                                    $title = esc_html($item->title);

                                    if (!$item->menu_item_parent) :
                                        $parent_id = $item->ID;
                                        ?>
                                        <li>
                                            <?php if (has_submenu($menuitems, $parent_id)) : ?>
                                                <div class="dropdown">
                                                  <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" onclick="window.location.href='<?php echo $link; ?>'">
                                                         <?php echo $title; ?>
                                                  <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/caret-down.svg'); ?>" alt="caret-down">
                                                  </button>
                                                  <!-- Services Dropdown -->
                                                  <?php if (strtolower($title) === 'services') : ?>
                                                      <ul class="dropdown-menu">
                                                          <?php 
                                                          // Fetch the "Services" page by slug
                                                          $services_page = get_page_by_path('services'); // Replace 'services' with the correct slug
                                                          if ($services_page) {
                                                              $services_page_id = $services_page->ID;

                                                              // Check if the 'our_services' repeater field exists and has rows
                                                              if (have_rows('our_services', $services_page_id)) {
                                                                  while (have_rows('our_services', $services_page_id)) {
                                                                      the_row();
                                                                      $service_heading = get_sub_field('service_heading'); // Service heading
                                                                      $service_id = preg_replace("/[^a-zA-Z]+/", "", $service_heading); // Generate sanitized ID
                                                                      ?>
                                                                      <li>
                                                                          <a class="dropdown-item" href="<?php echo esc_url(get_permalink($services_page_id) . '#' . $service_id); ?>">
                                                                              <?php echo esc_html($service_heading); ?>
                                                                          </a>
                                                                      </li>
                                                                      <?php
                                                                  }
                                                              } else {
                                                                  echo '<li><a class="dropdown-item" href="#">No Services Found</a></li>';
                                                              }
                                                          } else {
                                                              echo '<li><a class="dropdown-item" href="#">Services Page Not Found</a></li>';
                                                          }
                                                          ?>
                                                      </ul>
                                                  <?php endif; ?>
                                                <!-- End Services Dropdown -->
                                            <?php else : ?>
                                                <a href="<?php echo $link; ?>" class="title">
                                                    <?php echo $title; ?>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if ($parent_id == $item->menu_item_parent) : ?>
                                            <?php if (!$submenu) : $submenu = true; ?>
                                                <ul class="dropdown-menu">
                                            <?php endif; ?>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo $link; ?>"><?php echo $title; ?></a>
                                            </li>
                                            <?php if ($menuitems[$count + 1]->menu_item_parent != $parent_id && $submenu) : ?>
                                                </ul>
                                                </div>
                                                <?php $submenu = false; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if ($count + 1 >= count($menuitems) || $menuitems[$count + 1]->menu_item_parent != $parent_id) {
                                            echo '</li>';
                                            $submenu = false;
                                        } ?>
                                        <?php $count++; endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <!--nav-->
            </div>
        </div>
    </header>
    <!--header-->
</body>
</html>