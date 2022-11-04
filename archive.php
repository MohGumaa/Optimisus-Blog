<?php
/**
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="py-4" id="archive-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row gx-0 gx-md-3 gx-lg-5">

			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php
					if ( have_posts() ) : 
				?>
					<h1 class="page-header mb-3 pb-1"><?php _e( 'Browsing:', 'realresearcher' );?><span><?php single_cat_title(); ?></span></h1>
					<?php the_archive_description( '<div class="taxonomy-description small mb-4">', '</div>' ); ?>

				<div class="row">
				
				<?php 
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', get_post_format() );
					}
				?>

				</div>

				<?php else : 
					get_template_part( 'loop-templates/content', 'none' );
					endif; 
				?>

			</main>

			<?php
			understrap_pagination();
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div>

	</div>

</div>

<?php
get_footer();
