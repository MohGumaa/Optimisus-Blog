<?php
/**
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="py-4" id="error-404-wrapper">

	<div class="container" id="content" tabindex="-1">
		<main class="site-main" id="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title mb-3 pb-1"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'understrap' ); ?></h1>
				</header>
				<div class="page-contetn">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'understrap' ); ?></p>
					<?php get_search_form(); ?>
				</div>
				<div class="mt-4 pt-3 recent-posts">
					<div class="header-with-underline border-bottom mb-3">
						<h2 class="heading">latest <span class="text-warning">articles</span></h2>
					</div>
				</div>
				<?php 
					$args = array( 
						'posts_per_page' =>  9,	
					);
					$lastest_articles = new WP_Query( $args );

					if ( $lastest_articles->have_posts() ) :
						$loop = 0;
				?>
					<div class="row">
						<?php while( $lastest_articles->have_posts() ) : $lastest_articles->the_post(); ?>
							<div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-3 grid-card <?php echo ++$loop === 9 ? 'd-block d-md-none d-lg-block' : '' ?>">
								<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
									<div class="card border-0 h-100">
										<a href="<?php the_permalink();?>" class="card-img-top">
											<?php echo get_the_post_thumbnail( $post->ID, 'blog-featured' ); ?>
										</a>
										<div class="card-body py-2 px-0">
											<span class="d-block card-text mb-2">
												<small class="text-muted fs-Xsmall"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
												<small class="text-muted ms-3 fs-Xsmall"><i class="fa fa-book" aria-hidden="true"></i> <?php echo esc_html(wp_reading_time());?></small>
											</span>
											<?php
											the_title(
												sprintf( '<h3 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
												'</a></h3>'
											);
											?>
											<?php the_excerpt(); ?>
										</div>
									</div>
								</article>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; wp_reset_postdata(); ?>
			</section>
		</main>
	</div>

</div>

<?php
get_footer();
