<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Dispensary
 */

get_header(); ?>

	<div id="primary" class="col-lg-12 content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/dispensary', get_post_format() ); ?>

			<?php endwhile; ?>

			<?php
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( '<i class="fa fa-chevron-left"></i>', 'wpdispensary' ),
				'next_text'          => __( '<i class="fa fa-chevron-right"></i>', 'wpdispensary' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wpdispensary' ) . ' </span>',
			) );
			?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
