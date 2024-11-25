<?php
/**
 * Dreamway Media functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dreamway_Media
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '2.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dreamway_media_setup() {
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on Dreamway Media, use a find and replace
        * to change 'dreamway-media' to the name of your theme in all the template files.
        */
    load_theme_textdomain( 'dreamway-media', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support( 'title-tag' );

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary', 'dreamway-media' ),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'dreamway_media_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action( 'after_setup_theme', 'dreamway_media_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dreamway_media_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'dreamway_media_content_width', 640 );
}
add_action( 'after_setup_theme', 'dreamway_media_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dreamway_media_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'dreamway-media' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'dreamway-media' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    // Footer widget area
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Widget Area', 'dreamway-media' ),
            'id'            => 'footer-1',
            'description'   => esc_html__( 'Add widgets here for the footer.', 'dreamway-media' ),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'dreamway_media_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dreamway_media_scripts() {
    // wp_enqueue_style( 'dreamway-media-style', get_stylesheet_uri(), array());

    wp_enqueue_style( 'dreamway-media-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_script( 'dreamway-media-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'logo-handler', get_template_directory_uri() . '/js/logo-handler.js', array(), '1.0', true );
    wp_script_add_data( 'dreamway-media-navigation', 'async', true );
    if ( is_page( 'contact' ) ) { // Replace 'contact' with your actual contact page slug or ID
        wp_enqueue_style( 'font-awesome-4.7', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
    }
    // Check if comments are open and enqueue the comment reply script.
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    // Localize script for dynamic data
    wp_localize_script( 'dreamway-media-navigation', 'dreamwayMedia', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'some_text' => __( 'This is a localized string.', 'dreamway-media' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'dreamway_media_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));

    
} else {
    // Fallback: ACF is not active
    function acf_fallback_notice() {
        echo '<div class="error"><p>' . __( 'The ACF plugin is required for theme options.', 'dreamway-media' ) . '</p></div>';
    }
    add_action( 'admin_notices', 'acf_fallback_notice' );
}

/**
 * Check if a menu item has submenus.
 *
 * @param array $menuitems Array of menu items.
 * @param int $parent_id Parent menu item ID.
 * @return bool True if the menu has submenus, false otherwise.
 */
function has_submenu($menuitems, $parent_id) {
    foreach ($menuitems as $item) {
        if ($item->menu_item_parent == $parent_id) {
            return true;
        }
    }
    return false;
}
function add_accessibility_script() {
    ?>
    <script> (function(){ var s = document.createElement('script'); var h = document.querySelector('head') || document.body; s.src = 'https://acsbapp.com/apps/app/dist/js/app.js'; s.async = true; s.onload = function(){ acsbJS.init({ statementLink : '', footerHtml : '', hideMobile : false, hideTrigger : false, disableBgProcess : false, language : 'en', position : 'left', leadColor : '#000000', triggerColor : '#c8f031', triggerRadius : '50%', triggerPositionX : 'left', triggerPositionY : 'bottom', triggerIcon : 'people', triggerSize : 'medium', triggerOffsetX : 20, triggerOffsetY : 20, mobile : { triggerSize : 'small', triggerPositionX : 'right', triggerPositionY : 'bottom', triggerOffsetX : 10, triggerOffsetY : 10, triggerRadius : '50%' } }); }; h.appendChild(s); })(); </script>
    <?php
}
add_action('wp_footer', 'add_accessibility_script');
function dreamway_register_hero_slides_cpt() {
    $labels = array(
        'name'                  => _x( 'Hero Slides', 'Post Type General Name', 'dreamway-media' ),
        'singular_name'         => _x( 'Hero Slide', 'Post Type Singular Name', 'dreamway-media' ),
        'menu_name'             => __( 'Hero Slides', 'dreamway-media' ),
        'name_admin_bar'        => __( 'Hero Slide', 'dreamway-media' ),
        'archives'              => __( 'Slide Archives', 'dreamway-media' ),
        'attributes'            => __( 'Slide Attributes', 'dreamway-media' ),
        'parent_item_colon'     => __( 'Parent Slide:', 'dreamway-media' ),
        'all_items'             => __( 'All Slides', 'dreamway-media' ),
        'add_new_item'          => __( 'Add New Slide', 'dreamway-media' ),
        'add_new'               => __( 'Add New', 'dreamway-media' ),
        'new_item'              => __( 'New Slide', 'dreamway-media' ),
        'edit_item'             => __( 'Edit Slide', 'dreamway-media' ),
        'update_item'           => __( 'Update Slide', 'dreamway-media' ),
        'view_item'             => __( 'View Slide', 'dreamway-media' ),
        'view_items'            => __( 'View Slides', 'dreamway-media' ),
        'search_items'          => __( 'Search Slide', 'dreamway-media' ),
        'not_found'             => __( 'Not found', 'dreamway-media' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'dreamway-media' ),
        'featured_image'        => __( 'Slide Image', 'dreamway-media' ),
        'set_featured_image'    => __( 'Set slide image', 'dreamway-media' ),
        'remove_featured_image' => __( 'Remove slide image', 'dreamway-media' ),
        'use_featured_image'    => __( 'Use as slide image', 'dreamway-media' ),
        'insert_into_item'      => __( 'Insert into slide', 'dreamway-media' ),
        'uploaded_to_this_item' => __( 'Uploaded to this slide', 'dreamway-media' ),
        'items_list'            => __( 'Slides list', 'dreamway-media' ),
        'items_list_navigation' => __( 'Slides list navigation', 'dreamway-media' ),
        'filter_items_list'     => __( 'Filter slides list', 'dreamway-media' ),
    );
    $args = array(
        'label'                 => __( 'Hero Slide', 'dreamway-media' ),
        'description'           => __( 'Slides for the homepage hero section.', 'dreamway-media' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-images-alt2',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
    );
    register_post_type( 'hero_slides', $args );
}
add_action( 'init', 'dreamway_register_hero_slides_cpt', 0 );

function create_services_post_type() {
    $labels = array(
        'name' => __('Services'),
        'singular_name' => __('Service'),
        'add_new' => __('Add New Service'),
        'add_new_item' => __('Add New Service'),
        'edit_item' => __('Edit Service'),
        'new_item' => __('New Service'),
        'all_items' => __('All Services'),
        'view_item' => __('View Service'),
        'search_items' => __('Search Services'),
        'not_found' => __('No services found'),
        'not_found_in_trash' => __('No services found in Trash'),
        'menu_name' => __('Services')
    );

    $args = array(
        'labels' => $labels,
        'description' => 'Displays the list of services offered',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes'),
        'has_archive' => false,
        'rewrite' => array('slug' => 'services'),
        'menu_icon' => 'dashicons-admin-tools', // Optional icon
        'orderby' => 'menu_order',
        'order' => 'ASC',        // Or 'DESC' if you want descending order
    );

    register_post_type('services', $args);
}
add_action('init', 'create_services_post_type');
