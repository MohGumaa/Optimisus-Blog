<?php
/**
 * Search results partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="card border-0 round-0">
		<div class="row g-0">
			<div class="col-4">
				<a href="<?php the_permalink();?>">
					<?php echo get_the_post_thumbnail( $post->ID, 'blog-featured' ); ?>
				</a>
			</div>
			<div class="col-8">
				<div class="card-body ps-3 pe-0 py-1">
					<?php
					the_title(
						sprintf( '<h2 class="card-title mb-0"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
						'</a></h2>'
					);
					?>
					<small class="d-inline-block text-muted fs-Xsmall mb-0 mb-lg-2"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
					<small class="d-inline-block text-muted ms-3 fs-Xsmall mb-0 mb-lg-2"><i class="fa fa-book" aria-hidden="true"></i> <?php echo esc_html(wp_reading_time());?></small>
					<?php the_excerpt(  ) ?>
				</div>
			</div>
		</div>
	</div>
</article>

