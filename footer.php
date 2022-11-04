<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="py-2 text-capitalize text-center fs-small" id="wrapper-footer">
	<span>© copyright <?php echo date('Y'); ?> all rights reserved | Optimisus</span>
</div>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

