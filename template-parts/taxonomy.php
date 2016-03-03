<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Dispensary
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large-image'); ?></a>
	<?php } ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="entry-meta">
			<?php wp_dispensary_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<?php wp_dispensary_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
