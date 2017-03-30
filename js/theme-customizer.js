( function( $ ){
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).html( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).html( to );
		} );
	} );
	wp.customize( 'zh2plus_color_bkg', function( value ) {
		value.bind( function( to ) {
			$('body').css('background-color', to );
		} );
	} );
	
	
	wp.customize( 'zh2plus_color_mainlinks', function( value ) {
		value.bind( function( to ) {
			$('h2, a:link, a:visited, .menu-divider, .footer li, .social li, .all_posts a').css('color', to );
		} );
	} );
	wp.customize( 'zh2plus_color_mainlinkshover', function( value ) {
		value.bind( function( to ) {
			$('h2, a:hover, .all_posts a:hover').css('color', to );
		} );
	} );
	wp.customize( 'zh2plus_color_secondarylinks', function( value ) {
		value.bind( function( to ) {
			$('.post a:link, .post a:visited').css('color', to );
		} );
	} );
	wp.customize( 'zh2plus_color_secondarylinkshover', function( value ) {
		value.bind( function( to ) {
			$('.post a:hover').css('color', to );
		} );
	} );
	wp.customize( 'zh2plus_color_taglinelink', function( value ) {
		value.bind( function( to ) {
			$('h1 a#tagline').css('color', to );
		} );
	} );
	wp.customize( 'zh2plus_color_fonts', function( value ) {
		value.bind( function( to ) {
			$('p, .post ul, .post li').css('color', to );
		} );
	} );
	wp.customize( 'zh2plus_color_h2', function( value ) {
		value.bind( function( to ) {
			$('h2').css('color', to );
		} );
	} );
	wp.customize( 'zh2plus_color_h3h5h6', function( value ) {
		value.bind( function( to ) {
			$('h3, h5, h6').css('color', to );
		} );
	} );
	wp.customize( 'zh2plus_color_h4', function( value ) {
		value.bind( function( to ) {
			$('h4').css('color', to );
		} );
	} );
	wp.customize( 'zh2plus_social_links_title', function( value ) {
		value.bind( function( to ) {
			$( '.social-title' ).html( to );
		} );
	} );
	wp.customize( 'zh2plus_tagline_pages_dropdown', function( value ) {
		value.bind( function( to ) {
			$( 'h1 a#tagline' ).html( to );
		} );
	} );

	
} )( jQuery );