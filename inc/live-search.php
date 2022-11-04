<?php 
/**
 * Live Search Form
 *
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => 5, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'post', 'post_status' => 'publish' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); 
    ?>
        <li class="list-group-item lh-sm">
            <a href="<?php the_permalink();?>" class="small fw-bolder">
                <?php the_title();?>
            </a>
        </li>
    <?php endwhile; ?>        
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>?s=<?php echo esc_attr( $_POST['keyword'] ); ?>" class="btn btn-dark text-white text-capitalize rounded-0">
            <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
            <?php esc_html_e( 'view more', 'understrap' ); ?>
        </a>
	<?php else:?>
        <li class="list-group-item">
            <span class="fs-6"><?php esc_html_e( 'No results for', 'understrap' ); ?> "<strong><?php echo esc_attr( $_POST['keyword'] ); ?></strong>"</span>
        </li>
    <?php endif;
    wp_reset_postdata(); 
    die();
}
// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetchResults(){
	var keyword = jQuery('#searchInput').val();
	if(keyword == ""){
		jQuery('#data-fetch').html("");
	} else {
		jQuery.ajax({
			url: '<?php echo admin_url('admin-ajax.php'); ?>',
			type: 'post',
			data: { action: 'data_fetch', keyword: keyword  },
			success: function(data) {
				jQuery('#live-search-result').html( data );
			}
		});
	}
    

}
</script>

<?php
}