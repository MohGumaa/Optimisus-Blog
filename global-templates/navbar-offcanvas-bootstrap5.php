<?php
/**
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<nav id="main-nav" class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-1" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>

	<div class="container position-relative">

		<button class="menu__toggler p-0 d-flex d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
			<span></span>
		</button>

		<?php if ( ! has_custom_logo() )  : ?>
			<a class="navbar-brand text-white text-capitalize" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">Optimisus</a>
		<?php else : ?>
			<?php the_custom_logo(); ?>
		<?php endif; ?>

		<!-- Menu -->
		<div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="navbarNavOffcanvas">
			<div class="offcanvas-header justify-content-end">
				<button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'offcanvas-body px-0 py-1 py-md-0',
					'container_id'    => '',
					'menu_class'      => 'navbar-nav justify-content-start flex-grow-1 px-0 px-lg-3',
					'fallback_cb'     => '',
					'menu_id'         => 'main-menu',
					'depth'           => 2,
					'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			);
			?>
		</div>

		<i id="btn-search" class="fa fa-search fs-5 mb-0 text-white" role="button"></i>
		
		<form action="<?php echo esc_url(home_url( '/' ));?>" id="form-search" class="live-search-form" autocomplete="off">
			<label class="sr-only" for="searchInput">Search</label>
			<div class="input-group">
				<input class="field form-control rounded-0" id="searchInput" name="s" type="text" placeholder="Search …" value="" onkeyup="fetchResults()">
				<span class="input-group-append">
					<button class="btn btn-dark rounded-0"><i class="fa fa-search text-white"></i></button>
				</span>
			</div>
			<ul id="live-search-result" class="list-group rounded-0"></ul>
		</form>

	</div>

</nav>
