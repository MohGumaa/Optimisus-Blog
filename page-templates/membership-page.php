<?php
/**
 * Template Name: Membership Page
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="membership-page-wrapper py-5">

	<div class="container" id="content">
        <main class="site-main" id="main" role="main">
            <?php
            while ( have_posts() ) {
                the_post();
                get_template_part( 'loop-templates/content', 'page' );
            }
            ?>
        </main>
	</div>

</div>

<?php
get_footer();
