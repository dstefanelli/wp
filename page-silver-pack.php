<?php
/*
	Template Name: Página de boda simple
 */

get_header(); ?>

<?php //IMAGEN DE CABECERA

$arg = array(
	'type'=>'post',
	'posts_per_page'=>1,
	'category_name' => 'destacada',
	'tag' => 'carlosysofia'
);
$outstanding = new WP_Query( $arg );

if ( $outstanding-> have_posts() ) :
while ( $outstanding-> have_posts() ): $outstanding->the_post(); ?> 
<?php get_template_part('template-parts/outstanding', get_post_format()); ?>
<?php endwhile;
endif;

wp_reset_postdata();


?>
<?php get_footer(); ?>