<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div class="col-md-6 col-sm-6 col-12 mb-3 grid-card">
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
