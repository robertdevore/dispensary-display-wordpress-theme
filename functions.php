<?php
/**
 * WP Dispensary functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Dispensary
 */

if ( ! function_exists( 'wp_dispensary_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_dispensary_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Dispensary, use a find and replace
	 * to change 'wp-dispensary' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-dispensary', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'wp-dispensary' ),
		'footer' => esc_html__( 'Footer Menu', 'wp-dispensary' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wp_dispensary_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Create custom featured image size for the widget
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'large-image', 750, 350, true );
		add_image_size( 'dispensary-image', 360, 250, true );
	}

}
endif; // wp_dispensary_setup
add_action( 'after_setup_theme', 'wp_dispensary_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_dispensary_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_dispensary_content_width', 750 );
}
add_action( 'after_setup_theme', 'wp_dispensary_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */	
function wp_dispensary_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wp-dispensary' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

if( class_exists( 'WP_Dispensary' ) ) {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Flowers', 'wp-dispensary' ),
		'id'            => 'sidebar-flowers',
		'description'   => 'Widgets that display on all flower posts',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Concentrates', 'wp-dispensary' ),
		'id'            => 'sidebar-concentrates',
		'description'   => 'Widgets that display on all concentrate posts',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Edibles', 'wp-dispensary' ),
		'id'            => 'sidebar-edibles',
		'description'   => 'Widgets that display on all edible posts',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Pre-Rolls', 'wp-dispensary' ),
		'id'            => 'sidebar-prerolls',
		'description'   => 'Widgets that display on all pre-roll posts',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}

	register_sidebar( array(
		'name'          => esc_html__( 'Footer row #1', 'wp-dispensary' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer row #2', 'wp-dispensary' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer row #3', 'wp-dispensary' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer row #4', 'wp-dispensary' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'wp_dispensary_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_dispensary_scripts() {
	wp_enqueue_style( 'wp-dispensary-underscores', get_stylesheet_uri() );
	wp_enqueue_style( 'wp-dispensary-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'wp-dispensary-style', get_template_directory_uri() . '/css/wp-dispensary.css' );
	wp_enqueue_style( 'wp-dispensary-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900,300italic,400italic,700italic' );
	wp_enqueue_style( 'wp-dispensary-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'wp-dispensary-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20160307', true );
	wp_enqueue_script( 'wp-dispensary-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160307', true );
	wp_enqueue_script( 'wp-dispensary-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20160307', true );
	wp_enqueue_script( 'wp-dispensary-hoverIntent', get_template_directory_uri() . '/js/hoverIntent.min.js', array(), '20160307', true );
	wp_enqueue_script( 'wp-dispensary-js', get_template_directory_uri() . '/js/wp-dispensary.js', array(), '20160307', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_dispensary_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
