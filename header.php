<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Dispensary
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-dispensary' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="menu-toggle">
			<span><i class="fa fa-reorder"></i>Menu</span>
			<span class="menu-close"><i class="fa fa-times"></i>Close Menu</span>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
					<div class="site-branding">
					<?php if (get_theme_mod('wpd_logo') !='') { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'wpd_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
					<?php } else { ?>
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
						<?php endif; ?>
						<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					<?php } ?>
					</div><!-- .site-branding -->
				</div><!-- .col-lg-12 -->
			</div><!-- .row -->
			<?php get_template_part( 'template-parts/content', 'header' ); ?>
		</div><!-- .container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="container">
			<div class="row">