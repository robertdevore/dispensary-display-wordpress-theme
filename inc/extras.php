<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WP_Dispensary
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wp_dispensary_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'wp_dispensary_body_classes' );

/**
 * Removes archive title prefix.
 */
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_archive() ) {
            $title = post_type_archive_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
    return $title;
});

/** 
 * Add "Subtitles" plugin support for Custom Post Types
 */
function wpdispensary_add_subtitles_support() {
    add_post_type_support( 'flowers', 'subtitles' );
    add_post_type_support( 'edibles', 'subtitles' );
    add_post_type_support( 'concentrates', 'subtitles' );
    add_post_type_support( 'prerolls', 'subtitles' );
    add_post_type_support( 'topicals', 'subtitles' );
}
add_action( 'init', 'wpdispensary_add_subtitles_support' );

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'dispensarydisplay_register_required_plugins' );

function dispensarydisplay_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'WP Dispensary',
			'slug'      => 'wp-dispensary',
			'required'  => false,
		),
		array(
			'name'      => 'Dispensary Coupons',
			'slug'      => 'dispensary-coupons',
			'required'  => false,
		),
	);
	tgmpa( $plugins, $config );
}
