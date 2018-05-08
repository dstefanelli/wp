<?php
/**
 * 
 *
 * @package WordPress
 * @subpackage Wedding
 * @since 1.0
 * @version 1.0
 */

?>


<?php 
	
	if( has_post_thumbnail() )
	{
		$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
		echo '<section class="home-section home-full-height bg-dark bg-gradient" id="home"  data-background="'.$feat_image_url.'">';
		echo '<div class="titan-caption">
					<div class="caption-content">';
		echo '<div class="font-alt mb-30 titan-title-size-1">'.get_the_title().'</div>';
		echo '<div class="font-alt mb-40 titan-title-size-4">'.get_the_content().'</div>
						<a class="section-scroll btn btn-border-w btn-round" href="#alt-features">Ver como</a>
					</div>
				</div>
			</section>';
	}

?>