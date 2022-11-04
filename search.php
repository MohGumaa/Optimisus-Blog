<?php
/**
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="py-4" id="search-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row gx-0 gx-md-3 gx-lg-5">

			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main list-posts" id="main">

				<?php if ( have_posts() ) : ?>

					<h1 class="page-header mb-4 mb-md-5">
						<?php
						printf(
							esc_html__( 'Search Results for:%s', 'understrap' ),
							'<span class="text-theme text-dark">' . get_search_query() . '</span>'
						);
						?>
					</h1>

					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'loop-templates/content', 'search' );
					endwhile;
					?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main>

			<?php understrap_pagination(); ?>
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div>

	</div>

</div>

<?php
get_footer();
