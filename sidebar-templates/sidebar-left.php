<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-3 mt-5 mt-md-0 overflow-hidden widget-area" id="left-sidebar">
<?php else : ?>
	<div class="col-lg-4 col-md-5 mt-5 mt-md-0 overflow-hidden widget-area" id="left-sidebar">
<?php endif; ?>
<?php dynamic_sidebar( 'left-sidebar' ); ?>

</div>
