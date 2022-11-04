<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/reading-time.php',                    // Reading time of article
	'/thumbnail-recent-post.php',           // Add thumbnail image
	'/live-search.php',                     // Live Search
	'/primary-category.php',                // Primary Category
	'/sharing-buttons.php',                 // Sharing Buttons
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}

function meks_time_ago() {
	return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}

add_filter( 'excerpt_length', function($length) {
    return 100;
} );

// deactivate new block editor
function phi_theme_support() {
	remove_theme_support( 'widgets-block-editor' );
  }
  add_action( 'after_setup_theme', 'phi_theme_support' );

function my_login_logo_one() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {
	background-image: url(https://optimisus.com/wp-content/uploads/2022/09/Optimisus-Twitter-Logo-Pic.jpg); 
    border-radius: 50%;
} 
</style>
<?php 
} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );