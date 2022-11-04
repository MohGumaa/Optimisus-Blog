<?php
/**
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="py-4" id="page-wrapper">

	<div class="container" id="content" tabindex="-1">

		<main class="site-main" id="main">
			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'loop-templates/content', 'page' );
			}
			?>
		</main>

	</div>

</div>

<?php
get_footer();
