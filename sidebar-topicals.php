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

<?php if ( is_active_sidebar( 'sidebar-topicals' ) ) { ?>
	<?php dynamic_sidebar( 'sidebar-topicals' ); ?>
<?php } else { ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php } ?>

</div><!-- #secondary -->
