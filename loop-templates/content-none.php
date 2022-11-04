<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="no-results not-found">

	<h1 class="page-header mb-4 mb-md-5"><?php _e( 'Nothing:', 'realresearcher' );?><span><?php esc_html_e( 'Found', 'understrap' ); ?></span></h1>
	<div class="page-content">

		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			$kses = array( 'a' => array( 'href' => array() ) );
			printf(
				'<p>' . wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'understrap' ), $kses ) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :

			printf(
				'<p>%s<p>',
				esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'understrap' )
			);
			get_search_form();

		else :

			printf(
				'<p>%s<p>',
				esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'understrap' )
			);
			get_search_form();

		endif;
		?>
	</div>

</section>
