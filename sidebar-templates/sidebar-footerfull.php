<?php
/**
 * Sidebar setup for footer full
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<?php if ( is_active_sidebar( 'footerfull' ) ) : ?>

	<div class="py-3 py-md-4 bg-dark text-white footer-full" id="wrapper-footer-full" role="footer">

		<div class="container" id="footer-full-content" tabindex="-1">

			<div class="row">

				<?php dynamic_sidebar( 'footerfull' ); ?>

			</div>

		</div>

	</div>

	<?php
endif;
