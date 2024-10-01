<?php
/**
 * Dreamway Media Theme Customizer
 *
 * @package Dreamway_Media
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dreamway_media_customize_register( $wp_customize ) {
	// Enable live preview for the site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add selective refresh support if available.
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'dreamway_media_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'dreamway_media_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'dreamway_media_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 */
function dreamway_media_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site description for the selective refresh partial.
 */
function dreamway_media_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make the Theme Customizer preview reload changes asynchronously.
 */
function dreamway_media_customize_preview_js() {
	wp_enqueue_script(
		'dreamway-media-customizer',
		get_template_directory_uri() . '/js/customizer.js',
		array( 'customize-preview' ),
		_S_VERSION,
		true
	);
}
add_action( 'customize_preview_init', 'dreamway_media_customize_preview_js' );
