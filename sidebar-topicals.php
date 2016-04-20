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
				<td class="wpdispensary-title" colspan="6"><?php esc_html_e( 'Product Information', 'wp-dispensary' ); ?></td>
			</tr>
			<tr>
			<?php
				if ( get_post_meta( get_the_ID(), '_pricetopical', true ) ) {
					echo "<tr>";
					echo "<td><span>Price per unit</span></td>";
					echo "<td>$" . get_post_meta(get_the_id(), '_pricetopical', true) . "</td>";
					echo "</tr>";
				}
				if ( get_post_meta( get_the_ID(), '_sizetopical', true ) ) {
					echo "<tr>";
					echo "<td><span>Size (oz)</span></td>";
					echo "<td>" . get_post_meta(get_the_id(), '_sizetopical', true) . "</td>";
					echo "</tr>";
				}
				if ( get_post_meta( get_the_ID(), '_thctopical', true ) ) {
					echo "<tr>";
					echo "<td><span>THC mg</span></td>";
					echo "<td>" . get_post_meta(get_the_id(), '_thctopical', true) . "</td>";
					echo "</tr>";
				}
				if ( get_post_meta( get_the_ID(), '_cbdtopical', true ) ) {
					echo "<tr>";
					echo "<td><span>CBD mg</span></td>";
					echo "<td>" . get_post_meta(get_the_id(), '_cbdtopical', true) . "</td>";
					echo "</tr>";
				}
			?>
			</tr>
		</table>
	</aside>

<?php if ( is_active_sidebar( 'sidebar-topicals' ) ) { ?>
	<?php dynamic_sidebar( 'sidebar-topicals' ); ?>
<?php } else { ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php } ?>
</div><!-- #secondary -->
