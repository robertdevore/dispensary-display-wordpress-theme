<?php 

/**
 * Registers options with the Theme Customizer
 *
 * @param      object    $wp_customize    The WordPress Theme Customizer
 * @package    MNML
 * @since      1.0.0
 * @version    1.0.1
 */

function wpd_register_theme_customizer( $wp_customize ) {

	/*-----------------------------------------------------------*
	 * Site Title (logo) & Tagline section
	 *-----------------------------------------------------------*/
	// section adjustments
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Title (Logo) & Tagline', 'wpd' );
	$wp_customize->get_section( 'title_tagline' )->priority = 10;
	// site title
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_control( 'blogname' )->priority = 10;
	// site tagline
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';	
	$wp_customize->get_control( 'blogdescription' )->priority = 20;
	// logo uploader
	$wp_customize->add_setting( 'wpd_logo', array( 'default' => null ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpd_logo', array(
		'label'     => __( 'Site Logo', 'wpd' ),
		'section'   => 'title_tagline',
		'settings'  => 'wpd_logo',
		'priority'  => 30
	) ) );
	
	/*-----------------------------------------------------------*
	 * Color options
	 *-----------------------------------------------------------*/
	/* Link Color */
	$wp_customize->add_setting(
		'wpd_main_color',
		array(
			'default'     		 => '#76BD1D',
			'sanitize_callback'  => 'wpd_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
			    'label'      => 'Main Color',
			    'section'    => 'colors',
			    'settings'   => 'wpd_main_color'
			)
		)
	);
	/* Link Hover Color */
	$wp_customize->add_setting(
		'wpd_button_hover_color',
		array(
			'default'     		 => '#83d122',
			'sanitize_callback'  => 'wpd_sanitize_input',
			'transport'   		 => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'button_hover_color',
			array(
			    'label'      => 'Button Hover Color',
			    'section'    => 'colors',
			    'settings'   => 'wpd_button_hover_color'
			)
		)
	);
	
	/*-----------------------------------------------------------*
	 * Defining our own 'Home page splash' section
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'wpd_homepage_options',
		array(
			'title'     => 'Home Page',
			'priority'  => 40
		)
	);

	/* Display Home Page Splash title */
	$wp_customize->add_setting(
		'wpd_home_title',
		array(
			'default'            => '',
			'sanitize_callback'  => 'wpd_sanitize_text',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'wpd_home_title',
		array(
			'section'  => 'wpd_homepage_options',
			'label'    => 'Title',
			'type'     => 'text'
		)
	);

	/* Display Home Page Splash sub-title */
	$wp_customize->add_setting(
		'wpd_home_subtitle',
		array(
			'default'            => '',
			'sanitize_callback'  => 'wpd_sanitize_text',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'wpd_home_subtitle',
		array(
			'section'  => 'wpd_homepage_options',
			'label'    => 'Sub-title',
			'type'     => 'text'
		)
	);

	/* Home page button #1 text */
	$wp_customize->add_setting(
		'wpd_home_btn_text',
		array(
			'default'            => '',
			'sanitize_callback'  => 'wpd_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'wpd_home_btn_text',
		array(
			'section'  => 'wpd_homepage_options',
			'label'    => 'Button #1 Text',
			'type'     => 'text'
		)
	);

	/* Home page button #1 URL */
	$wp_customize->add_setting(
		'wpd_home_btn_url',
		array(
			'default'            => '',
			'sanitize_callback'  => 'wpd_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'wpd_home_btn_url',
		array(
			'section'  => 'wpd_homepage_options',
			'label'    => 'Button #1 URL',
			'type'     => 'text'
		)
	);

	/* Home page button #2 text */
	$wp_customize->add_setting(
		'wpd_home_btn2_text',
		array(
			'default'            => '',
			'sanitize_callback'  => 'wpd_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'wpd_home_btn2_text',
		array(
			'section'  => 'wpd_homepage_options',
			'label'    => 'Button #2 Text',
			'type'     => 'text'
		)
	);

	/* Home page button #2 URL */
	$wp_customize->add_setting(
		'wpd_home_btn2_url',
		array(
			'default'            => '',
			'sanitize_callback'  => 'wpd_sanitize_input',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'wpd_home_btn2_url',
		array(
			'section'  => 'wpd_homepage_options',
			'label'    => 'Button #2 URL',
			'type'     => 'text'
		)
	);

	
	/*-----------------------------------------------------------*
	 * Defining our own 'Display Options' section
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'wpd_display_options',
		array(
			'title'     => 'Copyright',
			'priority'  => 40
		)
	);

	/* Display Copyright */
	$wp_customize->add_setting(
		'wpd_copyright',
		array(
			'default'            => '',
			'sanitize_callback'  => 'wpd_sanitize_text',
			'transport'          => 'refresh'
		)
	);
	$wp_customize->add_control(
		'wpd_copyright',
		array(
			'section'  => 'wpd_display_options',
			'label'    => 'Copyright',
			'type'     => 'text'
		)
	);

	
} // end wpd_register_theme_customizer
add_action( 'customize_register', 'wpd_register_theme_customizer' );
/**
 * Sanitizes the incoming input and returns it prior to serialization.
 *
 * @param      string    $input    The string to sanitize
 * @return     string              The sanitized string
 * @package    wpd
 * @since      1.0.0
 * @version    1.0.0
 */
function wpd_sanitize_input( $input ) {
	return strip_tags( stripslashes( $input ) );
} // end wpd_sanitize_input

function wpd_sanitize_text( $input ) {
	$allowed = array(
		's'			=> array(),
		'br'			=> array(),
		'em'			=> array(),
		'i'			=> array(),
		'strong'		=> array(),
		'b'			=> array(),
		'a'			=> array(
			'href'			=> array(),
			'title'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'form'			=> array(
			'id'			=> array(),
			'class'			=> array(),
			'action'		=> array(),
			'method'		=> array(),
			'autocomplete'		=> array(),
			'style'			=> array(),
		),
		'input'			=> array(
			'type'			=> array(),
			'name'			=> array(),
			'class' 		=> array(),
			'id'			=> array(),
			'value'			=> array(),
			'placeholder'		=> array(),
			'tabindex'		=> array(),
			'style'			=> array(),
		),
		'img'			=> array(
			'src'			=> array(),
			'alt'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
			'height'		=> array(),
			'width'			=> array(),
		),
		'span'			=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'p'			=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'div'			=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'blockquote'		=> array(
			'cite'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
	);
    return wp_kses( $input, $allowed );
} // end wpd_sanitize_text

/**
 * Writes styles out the `<head>` element of the page based on the configuration options
 * saved in the Theme Customizer.
 *
 * @since      1.0.0
 * @version    1.0.0
 */
function wpd_customizer_css() {
?>
	<style type="text/css">
		-moz-selection,
		::selection{
			background: <?php echo get_theme_mod( 'wpd_main_color' ); ?>;
		}
		body{
			webkit-tap-highlight-color: <?php echo get_theme_mod( 'wpd_main_color' ); ?>;
		}
		a,
		a:visited,
		.entry-title a:hover,
		h1.entry-title a:hover,
		h2.entry-title a:hover,
		table.wpdispensary-table td {
			color: <?php echo get_theme_mod( 'wpd_main_color' ); ?>;
		}
		a:hover {
			color: #454545;
		}
		a.button:hover,
		button:hover,
		html input[type=button]:hover,
		input[type=reset]:hover,
		input[type=submit]:hover,
		#commentform #submit:hover {
			background: <?php echo get_theme_mod( 'wpd_button_hover_color' ); ?>;
			color: #FFF;
		}
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="url"]:focus,
		input[type="password"]:focus,
		input[type="search"]:focus,
		textarea:focus {
			border: 1px solid <?php echo get_theme_mod( 'wpd_main_color' ); ?>;
		}
		a.button,
		a.button:visited,
		button,
		html input[type=button],
		input[type=reset],
		input[type=submit],
		#commentform #submit,
		.menu-toggle {
			background: <?php echo get_theme_mod( 'wpd_main_color' ); ?>;			
		}
	</style>
<?php
} // end wpd_customizer_css
add_action( 'wp_head', 'wpd_customizer_css' );
/**
 * Registers the Theme Customizer Preview with WordPress.
 *
 * @package    wpd
 * @since      1.0.0
 * @version    1.0.0
 */
function wpd_customizer_live_preview() {
	wp_enqueue_script(
		'wpd-theme-customizer',
		get_template_directory_uri() . '/js/customizer.js',
		array( 'customize-preview' ),
		'1.0.0',
		true
	);
} // end wpd_customizer_live_preview
add_action( 'customize_preview_init', 'wpd_customizer_live_preview' );
