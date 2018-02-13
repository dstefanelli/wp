<?php

function wedding_style_script()
{
	wp_enqueue_style('styles', get_template_directory_uri().'/assets/css/style.css', array(), '1.0.0', 'all');
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/lib/bootstrap/dist/css/bootstrap.css', array(), '1.0.0', 'all');
	wp_enqueue_style('style', get_template_directory_uri().'/assets/lib/animate.css/animate.css', array(), '1.0.0', 'all');
}
	add_action('wp_enqueue_scripts', wedding_style_script);
?>
