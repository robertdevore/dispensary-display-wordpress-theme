<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WP_Dispensary
 */

if ( ! function_exists( 'wp_dispensary_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function wp_dispensary_posted_on() {

		if ( 'post' === get_post_type() ) {
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link"><i class="fa fa-comment"></i> ';
				comments_popup_link( esc_html__( 'Leave a comment', 'wp-dispensary' ), esc_html__( '1 Comment', 'wp-dispensary' ), esc_html__( '% Comments', 'wp-dispensary' ) );
				echo '</span>';
			}
		}

		if ( is_post_type_archive( array( 'prerolls', 'edibles' ) ) ) {
			if ( get_post_meta( get_the_ID(), '_priceeach', true ) ) {
				echo '$' . get_post_meta( get_the_id(), '_priceeach', true );
			}
		}

		if ( is_post_type_archive( array( 'growers' ) ) ) {
			if ( get_post_meta( get_the_ID(), '_clonecount', true ) ) {
				echo '<strong>Clones</strong> '. get_post_meta( get_the_id(), '_clonecount', true );
			}
			if ( get_post_meta( get_the_ID(), '_seedcount', true ) ) {
				echo '<strong>Seeds</strong> '. get_post_meta( get_the_id(), '_seedcount', true );
			}
			echo ' - ';
			if ( get_post_meta( get_the_ID(), '_priceeach', true ) ) {
				echo '<strong>Price:</strong> $' . get_post_meta( get_the_id(), '_priceeach', true );
			}
		}

		if ( is_post_type_archive( array( 'flowers', 'concentrates' ) ) ) {
			if ( get_post_meta( get_the_ID(), '_halfgram', true ) ) {
				echo '$' . get_post_meta( get_the_id(), '_halfgram', true );
			} elseif ( get_post_meta( get_the_ID(), '_gram', true ) ) {
				echo '$' . get_post_meta( get_the_id(), '_gram', true );
			} elseif ( get_post_meta( get_the_ID(), '_eighth', true ) ) {
				echo '$' . get_post_meta( get_the_id(), '_eighth', true );
			} elseif ( get_post_meta( get_the_ID(), '_quarter', true ) ) {
				echo '$' . get_post_meta( get_the_id(), '_quarter', true );
			} elseif ( get_post_meta( get_the_ID(), '_halfounce', true ) ) {
				echo '$' . get_post_meta( get_the_id(), '_halfounce', true );
			}
			echo ' - ';
			if ( get_post_meta( get_the_ID(), '_ounce', true ) ) {
				echo '$' . get_post_meta( get_the_id(), '_ounce', true );
			} elseif ( get_post_meta( get_the_ID(), '_halfounce', true ) ) {
				echo '$' . get_post_meta( get_the_id(), '_halfounce', true );
			} elseif ( get_post_meta( get_the_ID(), '_quarter', true ) ) {
				echo '$' . get_post_meta( get_the_id(), '_quarter', true );
			} elseif ( get_post_meta( get_the_ID(), '_eighth', true ) ) {
				echo '$' . get_post_meta( get_the_id(), '_eighth', true );
			} elseif ( get_post_meta( get_the_ID(), '_gram', true ) ) {
				echo '$' . get_post_meta( get_the_id(), '_gram', true );
			}
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'wp-dispensary' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link"><i class="fa fa-pencil"></i> ',
			'</span>'
		);

	}
endif;

if ( ! function_exists( 'wp_dispensary_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function wp_dispensary_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ),
				esc_attr( get_the_modified_date( 'c' ) ),
				esc_html( get_the_modified_date() )
			);

			$posted_on = sprintf(
				esc_html_x( '%s', 'post date', 'wp-dispensary' ), $time_string
			);

			echo '<span class="posted-on"><i class="fa fa-calendar"></i> ' . $posted_on . '</span>'; // WPCS: XSS OK.

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ' ', 'wp-dispensary' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( '%1$s', 'wp-dispensary' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		} elseif ( 'flowers' || 'edibles' || 'concentrates' || 'prerolls' === get_post_type() ) {
			echo '<span class="dispensary-comments"><i class="fa fa-comment"></i> ';
			echo comments_popup_link( esc_html__( '0', 'wp-dispensary' ), esc_html__( '1', 'wp-dispensary' ), esc_html__( '%', 'wp-dispensary' ) );
			echo '</span>'; // WPCS: XSS OK.
			if ( 'concentrates' === get_post_type() ) {
				echo "<span class='dispensary-category'>" .get_the_term_list( $post->ID, 'concentrates_category', '', ' ', '' ) . '</span>';
			} elseif ( 'edibles' === get_post_type() ) {
				echo "<span class='dispensary-category'>" .get_the_term_list( $post->ID, 'edibles_category', '', ' ', '' ) . '</span>';
			} elseif ( 'prerolls' === get_post_type() ) {
				$prerollflower = get_post_meta( get_the_id(), '_selected_flowers', true );
				echo "<span class='dispensary-category'>";
				echo "<a href='". get_permalink( $prerollflower ) ."'>". get_the_title( $prerollflower ) .'</a>';
				echo '</span>';
			} elseif ( 'growers' === get_post_type() ) {
				$growersflower = get_post_meta( get_the_id(), '_selected_flowers', true );
				echo "<span class='dispensary-category'>";
				echo "<a href='". get_permalink( $growersflower ) ."'>". get_the_title( $growersflower ) .'</a>';
				echo '</span>';
			} elseif ( 'flowers' === get_post_type() ) {
				echo "<span class='dispensary-category'>" .get_the_term_list( $post->ID, 'flowers_category', '', ' ', '' ) . '</span>';
			}
		}

	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function wp_dispensary_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'wp_dispensary_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'wp_dispensary_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so wp_dispensary_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so wp_dispensary_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in wp_dispensary_categorized_blog.
 */
function wp_dispensary_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'wp_dispensary_categories' );
}
add_action( 'edit_category', 'wp_dispensary_category_transient_flusher' );
add_action( 'save_post',     'wp_dispensary_category_transient_flusher' );
