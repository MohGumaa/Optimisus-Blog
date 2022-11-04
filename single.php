<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="py-4 single-post" id="single-wrapper">

	<div class="container" id="content" tabindex="-1">

		<main class="site-main" id="main">
			<?php while ( have_posts() ) : the_post(); ?>
				
				<article  <?php post_class(); ?> id="post-<?php the_ID(); ?>">

					<?php 
						echo htmlspecialchars(get_primary_category());
						the_title( '<h1 class="post-title">', '</h1>' ); 	
					?>

					<div class="d-flex align-items-center text-muted text-capitalize mb-2 mb-md-3 post-meta">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 );?>	
						<?php the_author_posts_link(); ?>
						<small class="text-muted ms-2 fs-small"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
						<small class="text-muted ms-2 fs-small"><i class="fa fa-book" aria-hidden="true"></i> <?php echo esc_html(wp_reading_time());?></small>
					</div>


					<?php echo do_shortcode("[social]"); ?>

					<div class="row">
						<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
						
						<div class="post-content">
							<?php 
								get_template_part( 'loop-templates/content', 'single' ); 
								get_template_part( 'loop-templates/related', 'posts' );
							?>
						</div>

						<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

					</div>

				</article>

			<?php endwhile; ?>
		</main>

	</div>

</div>

<?php
get_footer();
