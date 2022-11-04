<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="post-thumbnail mb-3">
	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	<span class="d-block text-muted p-2 fs-small"><?php the_post_thumbnail_caption();?></span>
</div>
<div class="content">
	<?php
	the_content();
	understrap_link_pages();
	?>
	<?php understrap_entry_footer(); ?>
</div>

<div class="d-flex flex-column flex-sm-row align-items-center text-center text-sm-start border py-4 px-3 shadow-sm rounded my-4 author-box">

	<?php echo get_avatar( get_the_author_meta( 'ID' ), 96 );?>
	<div class="ps-0 ps-md-3">
		<p class="text-muted text-capitalize fs-5 fw-semibold mb-2"><?php the_author_posts_link(); ?></p>
		<p class="small"><?php the_author_meta('description'); ?></p>
	</div>

</div>

