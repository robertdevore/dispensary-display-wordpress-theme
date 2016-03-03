<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Dispensary
 */

get_header(); ?>

	<div id="primary" class="col-lg-8 content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/flowers', 'single' ); ?>

			<?php if ( comments_open() || get_comments_number() ) { ?>
			<div class="comments">
				<?php comments_template(); ?>
			</div><!-- .comments -->
			<?php } ?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar('flowers'); ?>
<?php get_footer(); ?>
