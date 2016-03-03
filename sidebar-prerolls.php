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

<?php if ( get_post_meta( get_the_ID(), '_priceeach', true ) ) { ?>
	<aside id="price-list" class="widget">
		<table class="wpdispensary-table">
			<tr>
				<td class="wpdispensary-title" colspan="6"><?php esc_html_e( 'Price List', 'wp-dispensary' ); ?></td>
			</tr>
			<tr>
			<?php
					echo "<tr>";
					echo "<td><span>Each</span></td>";
					echo "<td>$" . get_post_meta(get_the_id(), '_priceeach', true) . "</td>";
					echo "</tr>";
			?>
			</tr>
		</table>
	</aside>
<?php } ?>

<?php if ( is_active_sidebar( 'sidebar-prerolls' ) ) { ?>
	<?php dynamic_sidebar( 'sidebar-prerolls' ); ?>
<?php } else { ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php } ?>
</div><!-- #secondary -->
