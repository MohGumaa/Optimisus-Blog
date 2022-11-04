<?php
/**
 * The main template file
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="py-4" id="index-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', get_post_format() );
					}
				} else {
					get_template_part( 'loop-templates/content', 'none' );
				}
				?>

			</main>

			<?php understrap_pagination(); ?>

			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div>

	</div>

</div>

<?php
get_footer();
