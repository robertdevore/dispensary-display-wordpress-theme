<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Dispensary
 */

?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
		<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
			<div class="row">
				<div class="col-lg-3 widget">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div><!-- .col-lg-3.widget -->
				<div class="col-lg-3 widget">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div><!-- .col-lg-3.widget -->
				<div class="col-lg-3 widget">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div><!-- .col-lg-3.widget -->
				<div class="col-lg-3 widget">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div><!-- .col-lg-3.widget -->
			</div><!-- .row -->
		<?php } ?>
			<div class="row bottom">
				<div class="col-lg-6 copyright">
					<?php if (get_theme_mod('wpd_copyright') !='') { ?>
						<?php echo get_theme_mod( 'wpd_copyright' ); ?>
					<?php } else { ?>
						<?php printf( esc_html__( '%s', 'wp-dispensary' ), 'Powered by ' ); ?> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wp-dispensary' ) ); ?>"><?php printf( esc_html__( '%s', 'wp-dispensary' ), 'WordPress' ); ?></a>
						<?php printf( esc_html__( '%s', 'wp-dispensary' ), ' &amp; ' ); ?>
						<?php printf( esc_html__( '%1$s', 'wp-dispensary' ), '<a href="https://www.wpdispensary.com" rel="WordPress theme">WP Dispensary</a>' ); ?>
					<?php } ?>
				</div><!-- .col-lg-12.copyright -->
				<div class="col-lg-6 menu">
					<?php
						$footermenu = wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'fallback_cb' => false ) );
						if ( ! empty ( $menu ) ) :
							echo $menu;
						endif;
					?>
				</div><!-- .col-lg-6.menu -->
			</div><!-- .row -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
