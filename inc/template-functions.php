<?php
/**
 * Functions that enhance the theme by hooking into WordPress.
 *
 * @package Dreamway_Media
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function dreamway_media_body_classes( $classes ) {
	// Adds a class of 'hfeed' to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of 'no-sidebar' when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'dreamway_media_body_classes' );

/**
 * Adds a pingback URL auto-discovery header for single posts, pages, or attachments.
 */
function dreamway_media_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'dreamway_media_pingback_header' );
