<?php 

//  Custom Functions
//  In the spirit of Zenhabit's minimalism, the functions will be as minimal as possible.
//  The idea here is to integrate the installation process with the Wordpress Admin Panel.
//  This premium version of zh2 - ZH2+ - adds several, perhaps unnecessary options.
//  There are also some security-related and Wordpress bloat-trimming code.
//
//  All this to slightly improve an already marvelous theme!


//  Add Custom Menu Support
add_theme_support( 'menus' );
register_nav_menus(  
        array(  
            'top_menu'               => 'Top Navigation',
			//  REMOVED IN zh2. Maybe I will add it in an expansion to the theme.  
            //  'also_see_menu'          => 'Also See Links on Archives page.',
			//  REMOVED IN zh2. Maybe I will add it in an expansion to the theme.
			'social_menu'            => 'Social Menu.',
			'footer_menu'            => 'Footer Menu.')  
        );  

//  Remove junk from head, including the current Wordpress version number, which is a big security no-no.
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

//  Integrate the zenhabits2 installation process with the Wordpress Admin Panel
 


     // Adding installation functions to the Wordpress Theme Customizer:
    function zh2plus_theme_customizer( $wp_customize ) {



    // Allows the site title and tagline t auto-refresh:
    $wp_customize->get_setting('blogname')->transport='postMessage';
    $wp_customize->get_setting('blogdescription')->transport='postMessage';

    $wp_customize->remove_section( 'static_front_page');
	// Remove the /// comment lines below to remove the Tagline field from the Title & Tagline section. Not recommended.
	/// $wp_customize->remove_control( 'blogdescription');


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// 
	//   This is the start of the zh2 Plus Special Options. Outside of this section are the normal zh22 functions
	//
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //////////////////////////
    // Various Color Selectors
    //////////////////////////

    // Page Background Color Selector.
    $wp_customize->add_setting( 'zh2plus_color_bkg', array(
        'default' => '#ffffff',
        'type' => 'option',
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
		'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zh2plus_color_bkg', array(
        'label'   => __('Page Background Color'),
        'section' => 'colors',
		'priority'       => 10,	
		'setting' => 'zh2plus_color_bkg',
    ) ) );


    // Main Link Color Selector.
    $wp_customize->add_setting( 'zh2plus_color_mainlinks', array(
        'default' => '#333333',
        'type' => 'option',
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
		'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zh2plus_color_mainlinks', array(
        'label'   => __('Main Links Color'),
        'section' => 'colors',
		'priority'       => 20,
		'setting' => 'zh2plus_color_mainlinks'
    ) ) );
	
    // Main Link Hover Color Selector.
    $wp_customize->add_setting( 'zh2plus_color_mainlinkshover', array(
        'default' => '#999999',
        'type' => 'option',
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
		'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zh2plus_color_mainlinkshover', array(
        'label'   => __('Main Links Hover Color'),
        'section' => 'colors',
		'priority'       => 30,
		'setting' => 'zh2plus_color_mainlinkshover'
    ) ) );

    // Secondary Link Color Selector.
    $wp_customize->add_setting( 'zh2plus_color_secondarylinks', array(
        'default' => '#303030',
        'type' => 'option',
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
		'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zh2plus_color_secondarylinks', array(
        'label'   => __('Secondary Links Color'),
		'priority'       => 40,
        'section' => 'colors',
		'setting' => 'zh2plus_color_secondarylinks'
    ) ) );
	
    // Secondary Link Hover Color Selector.
    $wp_customize->add_setting( 'zh2plus_color_secondarylinkshover', array(
        'default' => '#999999',
        'type' => 'option',
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
		'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zh2plus_color_secondarylinkshover', array(
        'label'   => __('Secondary Links Hover Color'),
        'section' => 'colors',
		'priority'       => 50,
		'setting' => 'zh2plus_color_secondarylinkshover'
    ) ) );

    // Tagline Link Color Selector.
    $wp_customize->add_setting( 'zh2plus_color_taglinelink', array(
        'default' => '#56A49F',
        'type' => 'option',
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
		'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zh2plus_color_taglinelink', array(
        'label'   => __('Tagline Link Color'),
        'section' => 'colors',
		'priority'       => 60,
		'setting' => 'zh2plus_color_taglinelink'
    ) ) );


    // Font Color Selector.
    $wp_customize->add_setting( 'zh2plus_color_fonts', array(
        'default' => '#333333',
        'type' => 'option',
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
		'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zh2plus_color_fonts', array(
        'label'   => __('Site Font Color'),
        'section' => 'colors',
		'priority'       => 70,
		'setting' => 'zh2plus_color_fonts'
    ) ) );


    // H2 Color Selector.
    $wp_customize->add_setting( 'zh2plus_color_h2', array(
        'default' => '#333333',
        'type' => 'option',
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
		'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zh2plus_color_h2', array(
        'label'   => __('H2 Font Color'),
        'section' => 'colors',
		'priority'       => 80,
		'setting' => 'zh2plus_color_h2'
    ) ) );
	
    // H3 H5 H6 Color Selector.
    $wp_customize->add_setting( 'zh2plus_color_h3h5h6', array(
        'default' => '#666666',
        'type' => 'option',
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
		'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zh2plus_color_h3h5h6', array(
        'label'   => __('H3, H5, H6 Font Color'),
        'section' => 'colors',
		'priority'       => 90,
		'setting' => 'zh2plus_color_h3h5h6'
    ) ) );

    // H4 Color Selector.
    $wp_customize->add_setting( 'zh2plus_color_h4', array(
        'default' => '#000000',
        'type' => 'option',
        'sanitize_callback'    => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
		'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zh2plus_color_h4', array(
        'label'   => __('H4 Font Color'),
        'section' => 'colors',
		'priority'       => 100,
		'setting' => 'zh2plus_color_h4'
    ) ) );

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // This creates the dropdown list of pages in the Theme Customizer and outputs the slug into the link instead of the page_ID.
	$list_pages = array();
	$list_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$list_pages[''] = __('Select a page:');
	foreach ($list_pages_obj as $page) {
		$list_pages[$page->post_name] = $page->post_title;
	}

    // Check box to show/hide tagline.
	$wp_customize->add_setting( 'zh2plus_tagline', array(
        'default' => 0,
	) );

	$wp_customize->add_control( 'zh2plus_tagline', array(
        'label' => __('Only display the title. (Hide the tagline)'),
        'type' => 'checkbox',
        'section' => 'title_tagline',
	) );


	//////////////////////////////////
    // Check box to show/hide top nav.
	$wp_customize->add_setting( 'zh2plus_top_nav_menu', array(
        'default' => 0,
	) );

	$wp_customize->add_control( 'zh2plus_top_nav_menu', array(
        'label' => __('Show navigation in header. (below site name)'),
        'type' => 'checkbox',
        'section' => 'nav',
	) );

	// Page select dropdown for the Title Tagline Link.	
    $wp_customize->add_setting('zh2plus_archives_pages_dropdown', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
 
    $wp_customize->add_control('zh2plus_archives_link', array(
        'label'      => __('Select your Archives Page from the list. (creates link for "See all posts >>")', 'zh2plus'),
        'section'    => 'nav',
        'type' => 'select',
        'choices' => $list_pages,
        'settings'   => 'zh2plus_archives_pages_dropdown'
    ));

	// Page select dropdown for the Archives Page Link.	
    $wp_customize->add_setting('zh2plus_tagline_pages_dropdown', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
 
    $wp_customize->add_control('zh2plus_tagline_link', array(
        'label'      => __('Select a page to create a tagline link', 'zh2plus'),
        'section'    => 'title_tagline',
        'type' => 'select',
        'choices' => $list_pages,
        'settings'   => 'zh2plus_tagline_pages_dropdown',
    ));

    // Add a custom social link title before the menu. Default is "Subscribe."
	$wp_customize->add_setting( 'zh2plus_social_links_title', array(
        'default' => 'Subscribe:',
        'type' => 'option',
		'transport' => 'postMessage',
	) );
 
	$wp_customize->add_control( 'zh2plus_social_links_title_select', array(
        'label' => __('Create a custom title before your social links navigation. Default is "Subscribe.'),
        'settings' => 'zh2plus_social_links_title',
        'section' => 'nav',
	) );

    // Checkbox to open links in same/new window.
	$wp_customize->add_setting( 'zh2plus_extlink', array(
        'default' => 0,
	) );

	$wp_customize->add_control( 'zh2plus_extlink', array(
        'label' => __('Open site links in a new tab/window.'),
        'type' => 'checkbox',
        'section' => 'nav',
		'priority'       => 200,
	) );

    // Checkbox to toggle author website link/author posts page link.
	$wp_customize->add_setting( 'zh2plus_author_link', array(
        'default' => 0,
	) );

	$wp_customize->add_control( 'zh2plus_author_link', array(
        'label' => __('Link author to website. (Instead of author posts page)'),
        'type' => 'checkbox',
        'section' => 'nav',
		'priority'       => 210,
	) );


    // Check box to show/hide the back to top link at bottom of page.
	$wp_customize->add_setting( 'zh2plus_backto_top', array(
        'default' => 0,
	) );

	$wp_customize->add_control( 'zh2plus_backto_top', array(
        'label' => __('Show back to top link in footer.'),
        'type' => 'checkbox',
        'section' => 'nav',
		'priority'       => 220,
	) );
	
	/////////////////////////////////////////////////////////////////////////////////////
    // Adds a textfield option to the Theme Customizer. Allows for the Custom CSS option.
	class Example_Customize_Textarea_Control extends WP_Customize_Control {
   	 public $type = 'textarea';
 
  	  public function render_content() {
    	    ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
 	   }
	}

    $wp_customize->add_section( 'custom-css', array(
        'title' => __('Custom CSS'), // The title of section
        'description' => __('Custom CSS'), // The description of section
		'priority'       => 200,
    ) );
	
	$wp_customize->add_setting( 'zh2plus_custom_css', array(
	) );
 
	$wp_customize->add_control(new Example_Customize_Textarea_Control($wp_customize,'zh2plus_custom_css',array(
		'label' => __('Add any custom CSS you have here.'),
		'section' => 'custom-css',
		'type' => 'textarea',
		'settings' => 'zh2plus_custom_css',
		)
  	  )
	);

    // Adding installation functions to the Wordpress Theme Customizer:
    $wp_customize->add_section( 'google-analytics', array(
        'title' => __('Google Analytics'), // The title of section
        'description' => __('Google Analytics'), // The description of section
		'priority'       => 210,
    ) );
	
	$wp_customize->add_setting( 'zh2plus_google_analytics', array(
        'default' => '',
	) );
 
	$wp_customize->add_control('zh2plus_google_analytics',array(
		'label' => __('Add your Google Analytics ID here. (Ex: UA-XXXXXXX-X)'),
		'section' => 'google-analytics',
		'type' => 'text',
		'settings' => 'zh2plus_google_analytics',
		)
 	);

    // The action below calls the contained live-editing javascript ONLY in the Theme Customizer.
	if ( $wp_customize->is_preview() && ! is_admin() ) {
		function zh2plus_customize_preview() {
 		   ?>
		    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/theme-customizer.js"></script>
		   <?php
		}  // End function zh2plus_customize_preview()
  	  add_action( 'wp_footer', 'zh2plus_customize_preview', 21);
	}
	
}

    // The below function outputs color/other styles from the Theme Customizer into the Wordpress header.


if (!is_admin()) {
	
	//Output the styles in the header.
	add_action('wp_head', 'zh2plus_custom_css');
	
	//begin zh2plus_custom_css()
	function zh2plus_custom_css() {
		
		$custom_css ='';
		
		/**custom css field**/
		if(get_option('zh2plus_color_bkg') != 'ffffff') {
			$custom_css .= 'body { background-color:#'.get_option('zh2plus_color_bkg').';}';
		}
		if(get_option('zh2plus_color_mainlinks') != '333333') {
			$custom_css .= 'h2, a:link, a:visited, .menu-divider, .footer li, .social li, .all_posts a {color: #'.get_option('zh2plus_color_mainlinks').';}';
		}
		if(get_option('zh2plus_color_mainlinkshover') != '999999') {
			$custom_css .= 'h2, a:hover, .all_posts a:hover {color: #'.get_option('zh2plus_color_mainlinkshover').';}';
		}
		if(get_option('zh2plus_color_secondarylinks') != '303030') {
			$custom_css .= '.post a:link, .post a:visited  {color: #'.get_option('zh2plus_color_secondarylinks').';}';
		}
		if(get_option('zh2plus_color_secondarylinkshover') != '999999') {
			$custom_css .= '.post a:hover, .footer a:hover  {color: #'.get_option('zh2plus_color_secondarylinkshover').';}';
		}
		if(get_option('zh2plus_color_taglinelink') != '56a49f') {
			$custom_css .= 'h1 a#tagline {color: #'.get_option('zh2plus_color_taglinelink').';}';
		}
		if(get_option('zh2plus_color_fonts') != '333333') {
			$custom_css .= 'p, .post ul, .post li {color: #'.get_option('zh2plus_color_fonts').';}';
		}
		if(get_option('zh2plus_color_h2') != '333333') {
			$custom_css .= 'h2 {color: #'.get_option('zh2plus_color_h2').';}';
		}
		if(get_option('zh2plus_color_h3h5h6') != '666666') {
			$custom_css .= 'h3, h5, h6 {color: #'.get_option('zh2plus_color_h3h5h6').';}';
		}
		if(get_option('zh2plus_color_h4') != '000000') {
			$custom_css .= 'h4 {color: #'.get_option('zh2plus_color_h4').';}';
		}
		if(get_theme_mod('zh2plus_custom_css') !='0') {
			$custom_css .= get_theme_mod('zh2plus_custom_css');
		}
		
		/**echo all css**/
		$css_output = "<!-- Custom CSS Styles -->\n<style type=\"text/css\">\n" . $custom_css . "\n</style>";
		if(!empty($custom_css)) { echo $css_output;}
		
	} //end zh2plus_custom_css()

} //end Custom CSS Header function.


add_action('wp_footer', 'ga');
 
function ga() {
 
    $account = get_theme_mod('zh2plus_google_analytics');
     
    $code = "<script type=\"text/javascript\"> 
      
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', '$account']);
      _gaq.push(['_trackPageview']);
      
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
      
    </script>"; 
     
    if (get_theme_mod('zh2plus_google_analytics') != '') echo $code;
 
}


    // The action below wraps up the Theme Customizer options.
	add_action( 'customize_register', 'zh2plus_theme_customizer', 11 );

?>