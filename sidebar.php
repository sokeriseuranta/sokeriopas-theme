<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package Deeblogi
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="primary" class="sidebar" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #secondary -->
<?php endif; ?>