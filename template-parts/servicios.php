<?php
/**
 *
 * @package WordPress
 * @subpackage Wedding
 * @since 1.0
 * @version 1.0
 */

?>

<?php 
	$arg = array('category_name' => 'servicios', 'showposts' => '8');
	$query = new WP_Query($arg);
	if ($query-> have_posts() ) {
		while ($query-> have_posts() ) {
			$query->the_post(); 
			echo '<div class="col-md-3 col-sm-6 col-xs-12">
												<div class="features-item">
													<div class="features-icon"><span class=" ion icon-lightbulb"></span></div>
													<h3 class="features-title font-alt">'. get_the_title() .'</h3>';
			echo '<p>'.get_the_content().'</p>';
			echo '</div></div>';
		} // end while
		wp_reset_postdata();
	} // end if
?>