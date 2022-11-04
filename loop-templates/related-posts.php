<?php
/**
 * The template for displaying all related posts
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

  $orig_post = $post;
  global $post;
  $tags = wp_get_post_tags($post->ID);
  $categories = get_the_category($post->ID);
  $args = array();

  if ( $tags ) {
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
    $args=array(
      'tag__in'             => $tag_ids,
      'post__not_in'        => array($post->ID),
      'posts_per_page'      => 4,
      'ignore_sticky_posts' => 1
    );
  } else {
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    $args=array(
      'category__in'        => $category_ids,
      'post__not_in'        => array($post->ID),
      'posts_per_page'      => 4,
      'ignore_sticky_posts' => 1
    );
  }

  $related_query = new wp_query( $args );
  $loop_iteration = 0; 
  if ( $related_query->have_posts() ) : 
 ?>

  <div class="mt-5 related-posts">
    <div class="header-with-underline border-bottom mb-3">
        <h2 class="heading"><?php esc_html_e( 'Related posts', 'understrap' ) ?></h2>
    </div>

    <div class="row gx-3">
      
      <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>

      <div class="col-md-4 col-sm-6 col-12 mb-3 grid-card <?php echo ++$loop_iteration == 4 ? 'd-block d-md-none' : '' ; ?>">
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
                </div>
            </div>
        </article>    
      </div>

      <?php endwhile; ?>

    </div>
  </div>

<?php
  endif;
  wp_reset_postdata(); 
?>