<?php
/**
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="py-4" id="author-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row gx-0 gx-md-3 gx-lg-5">

			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main list-posts" id="main">

				<?php 
					if ( get_query_var( 'author_name' ) ) {
						$curauth = get_user_by( 'slug', get_query_var( 'author_name' ) );
					} else {
						$curauth = get_userdata( intval( $author ) );
					}

					the_archive_title( '<h1 class="page-header mb-4">', '</h1>' );
				?>

				<div class="d-flex flex-column flex-sm-row align-items-center text-center text-sm-start mb-4 mb-md-5 author-box">
					<?php 
						if ( ! empty( $curauth->ID ) ) {
							$alt = sprintf(
								_x( 'Profile picture of %s', 'Avatar alt', 'understrap' ),
								$curauth->display_name
							);
							echo get_avatar( $curauth->ID, 96, '', $alt );
						}
						
					?>
					<?php if ( ! empty( $curauth->user_description ) ) : ?>
                        <div class="ps-0 ps-md-3">
							<p class="text-muted text-capitalize fs-5 fw-semibold mb-2"><?php echo $curauth->display_name; ?></p>
							<p class="small"><?php echo esc_html( $curauth->user_description ); ?></p>
						</div>
                    <?php endif; ?>
					
				</div>

				<?php
				if ( have_posts() ) {
					printf(
                        '<p class="fs-5 text-capitalize text-light">' . esc_html__( 'Articles by %s', 'understrap' ) . '</p>',
                        $curauth->display_name
                    );

					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'author' );
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
