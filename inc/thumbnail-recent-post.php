<?php
/**
 * Recent Post with thumbnail
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;

		if ( ! $number )
			$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		$recent_post = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
            'post__not_in'        => array(get_the_ID()),
			'ignore_sticky_posts' => true
		) ) );

		if ($recent_post->have_posts()) :
		?>
            <?php echo $args['before_widget']; ?>
            <?php if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            } ?>

            <div class="widget-list-posts">
                <?php while ( $recent_post->have_posts() ) : $recent_post->the_post(); ?>
                    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                        <div class="card border-0 round-0">
                            <div class="row g-0">
                                <div class="col-4">
                                    <a href="<?php the_permalink();?>">
                                        <?php echo get_the_post_thumbnail( get_the_ID(), 'blog-featured' ); ?>
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="card-body ps-3 pe-0 py-0">
                                        <?php
                                        the_title(
                                            sprintf( '<h4 class="card-title mb-0"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                                            '</a></h4>'
                                        );
                                        ?>
                                        <?php if ( $show_date ) :?>
                                            <small class="text-muted me-2 fs-small"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo meks_time_ago();?></small>
                                        <?php endif; ?>
                                        <small class="text-muted fs-small"><i class="fa fa-book" aria-hidden="true"></i> <?php echo esc_html(wp_reading_time());?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php echo $args['after_widget']; ?>
            <?php
            wp_reset_postdata();

		endif;
	}
}
function my_recent_widget_registration() {
unregister_widget('WP_Widget_Recent_Posts');
register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');
