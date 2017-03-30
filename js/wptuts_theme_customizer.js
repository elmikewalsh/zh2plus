/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * Things like site title and description changes.
 */

( function( $ ){
    wp.customize( 'wptuts[footer]', function( value ) {
        value.bind( function( to ) {
            $( '#site-generator a.wptuts-credits' ).html( to );
        } );
    } );
} )( jQuery );