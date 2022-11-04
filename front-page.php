<?php
/**
 * The main template file
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="py-4 front-page" id="front-page-wrapper">

    <main class="site-main" id="main">
        <?php 
            while ( have_posts() ) {
                the_post();
                get_template_part( 'loop-templates/content', 'front-page' );
            }
        ?>
    </main>

</div>

<?php
get_footer();
