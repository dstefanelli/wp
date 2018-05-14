<?php if( has_post_thumbnail() ) :
	$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
endif; ?>
<section class="home-section home-full-height bg-dark bg-gradient" id="home"  data-background="<?php echo $feat_image_url ?>">
	<div class="titan-caption">
		<div class="caption-content">
			<div class="font-alt mb-30 titan-title-size-1"><?php the_title() ?></div>
			<div class="font-alt mb-40 titan-title-size-4"><?php the_content() ?></div>
			<a class="section-scroll btn btn-border-w btn-round" href="#alt-features">Ver como</a>
		</div>
	</div>
</section>
