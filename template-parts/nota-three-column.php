<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Wedding
 * @since 1.0
 * @version 1.0
 */

?>

echo '<div class="col-sm-6 col-md-4 col-lg-4">
	<div class="post mb-20">
		<div class="post-thumbnail">
			<a href="'.get_the_permalink().'">
				<img src="'.$thumb_url[0].'" class="img-responsive"/>
			</a>
		</div>';
		echo '<div class="post-header font-alt">
		<h2 class="post-title">
			<a href="'.get_the_permalink().'">'. get_the_title() .'</a>
		</h2>
		<div class="post-meta">By&nbsp;<a href="#">'.get_the_author().'</a>&nbsp;| '.get_the_date().' | '.get_the_comments_pagination().'
		</div>
		</div>';
		echo '<div class="post-entry">
		<p>'. get_the_excerpt() .'</p>
		</div>
		<div class="post-more">
			<a class="more-link" href="#">Read more</a>
		</div>
	</div>
</div>';		

} // end while
wp_reset_postdata();