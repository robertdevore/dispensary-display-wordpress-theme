<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Dispensary
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-dispensary' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
		<?php if ( is_user_logged_in() ) { ?>
		<div class="entry-meta absolute">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'wp-dispensary' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link"><i class="fa fa-pencil"></i> ',
					'</span>'
				);
			?>
		</div><!-- .entry-meta -->
		<?php } ?>
	<footer class="entry-footer">
		<?php wp_dispensary_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
