/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * Things like site title and description changes.
 */

( function( $ ) {
	// Header text color.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( 'h1 a.site-title' ).html( to );
		} );
	} );
	// Header text color.
	wp.customize( 'zh2plus_color_taglinelinks', function( value ) {
		value.bind( function( to ) {
			$( 'a#tagline' ).css( 'colors', to );
		} );
	} );
} )( jQuery );
