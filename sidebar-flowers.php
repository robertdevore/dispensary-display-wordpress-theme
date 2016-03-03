<?php
/**
 * The sidebar containing the flowers widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Dispensary
 */

?>

<div id="secondary" class="col-lg-4 widget-area" role="complementary">

	<aside id="price-list" class="widget">
		<table class="wpdispensary-table">
			<tr>
				<td class="wpdispensary-title" colspan="6"><?php esc_html_e( 'Price List', 'wp-dispensary' ); ?></td>
			</tr>
			<tr>
			<?php
				if ( get_post_meta( get_the_ID(), '_halfgram', true ) ) {
					echo "<tr>";
					echo "<td><span>1/2 Gram</span></td>";
					echo "<td>$" . get_post_meta(get_the_id(), '_halfgram', true) . "</td>";
					echo "</tr>";
				}
				if ( get_post_meta( get_the_ID(), '_gram', true ) ) {
					echo "<tr>";
					echo "<td><span>1 Gram</span></td>";
					echo "<td>$" . get_post_meta(get_the_id(), '_gram', true) . "</td>";
					echo "</tr>";
				}
				if ( get_post_meta( get_the_ID(), '_eighth', true ) ) {
					echo "<tr>";
					echo "<td><span>1/8 Ounce</span></td>";
					echo "<td>$" . get_post_meta(get_the_id(), '_eighth', true) . "</td>";
					echo "</tr>";
				}
				if ( get_post_meta( get_the_ID(), '_quarter', true ) ) {
					echo "<tr>";
					echo "<td><span>1/4 Ounce</span></td>";
					echo "<td>$" . get_post_meta(get_the_id(), '_quarter', true) . "</td>";
					echo "</tr>";
				}
				if ( get_post_meta( get_the_ID(), '_halfounce', true ) ) {
					echo "<tr>";
					echo "<td><span>1/2 Ounce</span></td>";
					echo "<td>$" . get_post_meta(get_the_id(), '_halfounce', true) . "</td>";
					echo "</tr>";
				}
				if ( get_post_meta( get_the_ID(), '_ounce', true ) ) {
					echo "<tr>";
					echo "<td><span>1 Ounce</span></td>";
					echo "<td>$" . get_post_meta(get_the_id(), '_ounce', true) . "</td>";
					echo "</tr>";
				}
			?>
			</tr>
		</table>
	</aside>

<?php if ( is_active_sidebar( 'sidebar-flowers' ) ) { ?>
	<?php dynamic_sidebar( 'sidebar-flowers' ); ?>
<?php } else { ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php } ?>
</div><!-- #secondary -->
