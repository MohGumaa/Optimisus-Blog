<?php
/**
 * Sharing Buttons
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function post_social_sharing_buttons($content) {
	global $post;
	if(is_single()){
		$postURL = urlencode(get_permalink());
		$postTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		$postTitle = str_replace( ' ', '%20', get_the_title());
		$postThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

		$twitterURL = 'https://twitter.com/intent/tweet?text='.$postTitle.'&amp;url='.$postURL.'&amp;via=optimisus.com';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$postURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$postURL.'&amp;title='.$postTitle;
        $whatsappURL = 'https://api.whatsapp.com/send?text='.urldecode($postURL);
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$postURL.'&amp;media='.$postThumbnail[0].'&amp;description='.$postTitle;
 
       
		// Add sharing button at the end of page/page content
		$content .= '<div class="d-flex flex-column flex-md-row  justify-content-between align-items-center mb-4 share-social">';
		$content .= '<p class="text-uppercase text-center font-italic text-muted mb-4 mb-md-0 text-share d-none">share</p>';
		$content .= '<div class="d-flex flex-wrap justify-content-between justify-content-md-start align-items-center share-buttons">';
        $content .= '<a class="share-btn share-facebook" href="'.$facebookURL.'" target="_blank" title="share on facebook"><i class="fa fa-facebook"></i><span class="label">Facebook</span></a>';
        $content .= '<a class="share-btn share-twitter" href="'. $twitterURL .'" target="_blank" title="share on twitter"><i class="fa fa-twitter"></i><span class="label">Twitter</span></a>';
        $content .= '<a class="share-btn share-whatsapp" href="'. $whatsappURL .'" target="_blank" title="share on whatsapp"><i class="fa fa-whatsapp"></i><span class="label">whatsapp</span></a>';
		$content .= '<a class="share-btn share-linkedin" href="'.$linkedInURL.'" target="_blank" title="share on linkedin"><i class="fa fa-linkedin"></i><span class="label">Linkedin</span></a>';
        $content .= '<a class="share-btn share-pinterest" href="'.$pinterestURL.'" target="_blank" title="share on pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i><span class="label">Pinterest</span></a>';
        $content .=  '</div>';
        $content .=  '</div>';
		
		return $content;
	}else{
		return $content;
	}
};
add_filter( 'the_content', 'post_social_sharing_buttons');

// Shortcode [social]
add_shortcode('social','post_social_sharing_buttons');