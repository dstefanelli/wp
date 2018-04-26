<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Wedding
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="home-section home-parallax home-fade home-full-height bg-dark bg-dark-30" id="home" data-background="assets/images/section-4.jpg">
	<div class="titan-caption">
		<div class="caption-content">
			<div class="font-alt mb-30 titan-title-size-4">Error 404</div>
			<div class="font-alt">La página que buscas no existe o ha caducado.<br/>Es todo lo que sabemos :(
			</div>
			<div class="font-alt mt-30"><a class="btn btn-border-w btn-round" href="<?php echo home_url();?>">Volver al Inicio</a></div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
