<?php 
/**
 * Estimated Reading Time
 *
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function wp_reading_time() {
    $content = get_post_field( 'post_content');
    $word_count = str_word_count( strip_tags( $content ) );
    $image_count = substr_count( $content, '<img' );
    $reading_time = $word_count / 200;
    $image_time = ( $image_count * 10 ) / 60;
    $total_time = round( $reading_time + $image_time );
 
    if ( $total_time == 1 ) { 
    $minute = " min read"; 
    } else { 
    $minute = " mins read"; 
    }
 
    return $total_time . $minute;
}