/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Update the site title in real-time.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newVal ) {
			$( '.site-title a' ).text( newVal );
		} );
	} );

	// Update the site description (tagline) in real-time.
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newVal ) {
			$( '.site-description' ).text( newVal );
		} );
	} );

	// Handle header text color changes in real-time.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( newVal ) {
			// Hide the text if 'blank' is selected.
			if ( 'blank' === newVal ) {
				$( '.site-title, .site-description' ).css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				});
			} else {
				// Show the text and update the color.
				$( '.site-title, .site-description' ).css({
					clip: 'auto',
					position: 'relative',
				});
				$( '.site-title a, .site-description' ).css({
					color: newVal,
				});
			}
		} );
	} );
}( jQuery ) );
