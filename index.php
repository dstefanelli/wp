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
 * @subpackage Wedding Template
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<?php //IMAGEN DE CABECERA
		$arg = array(
			'type'=>'post',
			'posts_per_page'=>1,
			'category_name' => 'destacada'
		);
		$outstanding = new WP_Query( $arg );

		if ( $outstanding-> have_posts() ) :
			while ( $outstanding-> have_posts() ): $outstanding->the_post(); ?> 
				<?php get_template_part('template-parts/outstanding', get_post_format()); ?>
			<?php endwhile;
		endif;
		
		wp_reset_postdata();
		
    ?>
		<div class="main">
			<section class="module" id="services">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<h2 class="module-title font-alt">Nuestros Servicios</h2>
							<div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
						</div>
					</div>
					<div class="row multi-columns-row">
						<?php get_template_part('template-parts/servicios'); // Template categoría servicios ?>
					</div>
				</div>
			</section>
			<section class="module" id="alt-features">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<h2 class="module-title font-alt">Características</h2>
							<div class="module-subtitle font-serif">En solo un <em>Click</em> haz que tus invitados reciban los detalles de tu fiesta.</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-3 col-lg-3">
							<div class="alt-features-item">
								<div class="alt-features-icon"><span class="icon-strategy"></span></div>
								<h3 class="alt-features-title font-alt">Branding</h3>A wonderful serenity has taken possession of my entire soul like these sweet mornings.
							</div>
							<div class="alt-features-item">
								<div class="alt-features-icon"><span class="icon-tools-2"></span></div>
								<h3 class="alt-features-title font-alt">Development</h3>A wonderful serenity has taken possession of my entire soul like these sweet mornings.
							</div>
							<div class="alt-features-item">
								<div class="alt-features-icon"><span class="icon-target"></span></div>
								<h3 class="alt-features-title font-alt">Marketing</h3>A wonderful serenity has taken possession of my entire soul like these sweet mornings.
							</div>
							<div class="alt-features-item">
								<div class="alt-features-icon"><span class="icon-tools"></span></div>
								<h3 class="alt-features-title font-alt">Design</h3>A wonderful serenity has taken possession of my entire soul like these sweet mornings.
							</div>
						</div>
						<div class="col-md-6 col-lg-6 hidden-xs hidden-sm">
							<div class="alt-services-image align-center"><img src="http://127.0.0.1/tuinvitaciononline/wp-content/uploads/2018/05/iPhone-X-Silver.png" alt="Feature Image"></div>
						</div>
						<div class="col-sm-6 col-md-3 col-lg-3">
							<div class="alt-features-item">
								<div class="alt-features-icon"><span class="icon-camera"></span></div>
								<h3 class="alt-features-title font-alt">Photography</h3>A wonderful serenity has taken possession of my entire soul like these sweet mornings.
							</div>
							<div class="alt-features-item">
								<div class="alt-features-icon"><span class="icon-mobile"></span></div>
								<h3 class="alt-features-title font-alt">Mobile</h3>A wonderful serenity has taken possession of my entire soul like these sweet mornings.
							</div>
							<div class="alt-features-item">
								<div class="alt-features-icon"><span class="icon-linegraph"></span></div>
								<h3 class="alt-features-title font-alt">Music</h3>A wonderful serenity has taken possession of my entire soul like these sweet mornings.
							</div>
							<div class="alt-features-item">
								<div class="alt-features-icon"><span class="icon-basket"></span></div>
								<h3 class="alt-features-title font-alt">Shop</h3>A wonderful serenity has taken possession of my entire soul like these sweet mornings.
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="module" id="team">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<h2 class="module-title font-alt">Elige tu tema</h2>
							<div class="module-subtitle font-serif">Tenemos cuatro increibles formatos, elige el que más se ajuste a tu boda!</div>
						</div>
					</div>
					<div class="row">
						<div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
							<div class="team-item">
								<div class="team-image"><img src="wp-content/uploads/2018/02/team-1.jpg" alt="Member Photo" />
									<div class="team-detail">
										<h5 class="font-alt">Hi all</h5>
										<p class="font-serif">Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a&amp;nbsp;iaculis diam.</p>
										<div class="team-social"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a></div>
									</div>
								</div>
								<div class="team-descr font-alt">
									<div class="team-name">Clásica</div>
									<!--<div class="team-role">Art Director</div>-->
								</div>
							</div>
						</div>
						<div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
							<div class="team-item">
								<div class="team-image"><img src="wp-content/uploads/2018/02/team-2.jpg" alt="Member Photo" />
									<div class="team-detail">
										<h5 class="font-alt">Good day</h5>
										<p class="font-serif">Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a&amp;nbsp;iaculis diam.</p>
										<div class="team-social"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a></div>
									</div>
								</div>
								<div class="team-descr font-alt">
									<div class="team-name">Natural</div>
									<!--<div class="team-role">Creative director</div>-->
								</div>
							</div>
						</div>
						<div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
							<div class="team-item">
								<div class="team-image"><img src="wp-content/uploads/2018/02/team-3.jpg" alt="Member Photo" />
									<div class="team-detail">
										<h5 class="font-alt">Hello</h5>
										<p class="font-serif">Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a&amp;nbsp;iaculis diam.</p>
										<div class="team-social"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a></div>
									</div>
								</div>
								<div class="team-descr font-alt">
									<div class="team-name">Divertida</div>
								<!--	<div class="team-role">Account manager</div>-->
								</div>
							</div>
						</div>
						<div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
							<div class="team-item">
								<div class="team-image"><img src="wp-content/uploads/2018/02/team-4.jpg" alt="Member Photo" />
									<div class="team-detail">
										<h5 class="font-alt">Yes, it's me</h5>
										<p class="font-serif">Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a&amp;nbsp;iaculis diam.</p>
										<div class="team-social"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a></div>
									</div>
								</div>
								<div class="team-descr font-alt">
									<div class="team-name">Ecléctica</div>
									<!--<div class="team-role">Developer</div>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="module bg-dark-60 pt-0 pb-0 parallax-bg testimonial" data-background="http://127.0.0.1/tuinvitaciononline/wp-content/uploads/2018/05/adult-affection-beard-842546.jpg">
				<div class="testimonials-slider pt-140 pb-140">
					<ul class="slides">
						<li>
							<div class="container">
								<div class="row">
									<div class="col-sm-12">
										<div class="module-icon"><span class="icon-quote"></span></div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8 col-sm-offset-2">
										<blockquote class="testimonial-text font-alt">I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</blockquote>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4 col-sm-offset-4">
										<div class="testimonial-author">
											<div class="testimonial-caption font-alt">
												<div class="testimonial-title">Jack Woods</div>
												<div class="testimonial-descr">SomeCompany INC, CEO</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						<!--<li>
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="module-icon"><span class="icon-quote"></span></div>
</div>
</div>
<div class="row">
<div class="col-sm-8 col-sm-offset-2">
<blockquote class="testimonial-text font-alt">I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</blockquote>
</div>
</div>
<div class="row">
<div class="col-sm-4 col-sm-offset-4">
<div class="testimonial-author">
<div class="testimonial-caption font-alt">
<div class="testimonial-title">Jim Stone</div>
<div class="testimonial-descr">SomeCompany INC, CEO</div>
</div>
</div>
</div>
</div>
</div>
</li>
<li>
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="module-icon"><span class="icon-quote"></span></div>
</div>
</div>
<div class="row">
<div class="col-sm-8 col-sm-offset-2">
<blockquote class="testimonial-text font-alt">I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</blockquote>
</div>
</div>
<div class="row">
<div class="col-sm-4 col-sm-offset-4">
<div class="testimonial-author">
<div class="testimonial-caption font-alt">
<div class="testimonial-title">Adele Snow</div>
<div class="testimonial-descr">SomeCompany INC, CEO</div>
</div>
</div>
</div>
</div>
</div>
</li>-->
					</ul>
				</div>
			</section>
			<section class="module" id="pricing">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<h2 class="module-title font-alt">Nuestros Packs</h2>
							<div class="module-subtitle font-serif">Eliga entre nuestros tres posibles packs, cada pack agrega distintas funcionalidades.</div>
						</div>
					</div>
					<div class="row multi-columns-row">
						<div class="col-sm-6 col-md-4 col-lg-4">
							<div class="price-table font-alt">
								<h4>Plata</h4>
								<div class="borderline"></div>
								<p class="price"><span>€</span>29.99
								</p>
								<ul class="price-details">
									<li>100 invitaciones por e-mail</li>
									<li>15 Demos Included</li>
									<li>Newsletter</li>
									<li><span>Working Contact Form</span></li>
									<li><span>Unlimited Domains</span></li>
								</ul><a class="btn btn-d btn-round" href="#">Contratar</a>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-4">
							<div class="price-table font-alt best">
								<h4>Oro</h4>
								<p class="small">Recomendado</p>
								<div class="borderline"></div>
								<p class="price"><span>€</span>69.99
								</p>
								<ul class="price-details">
									<li>150 invitaciones por e-mail</li>
									<li>15 Demos Included</li>
									<li>Newsletter</li>
									<li>Working Contact Form</li>
									<li><span>Unlimited Domains</span></li>
								</ul><a class="btn btn-d btn-round" href="#">Contratar</a>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-4">
							<div class="price-table font-alt">
								<h4>Platino</h4>
								<div class="borderline"></div>
								<p class="price"><span>€</span>119.99
								</p>
								<ul class="price-details">
									<li>300 invitaciones por e-mail</li>
									<li>15 Demos Included</li>
									<li>Newsletter</li>
									<li>Working Contact Form</li>
									<li>Unlimited Domains</li>
								</ul><a class="btn btn-d btn-round" href="#">Contratar</a>
							</div>
						</div>
					</div>
					<div class="row mt-40">
						<div class="col-sm-6 col-sm-offset-3 align-center">
							<p>Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>
						</div>
					</div>
				</div>
			</section>
			<section class="module" id="news">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<h2 class="module-title font-alt">Te puede interesar</h2>
							<div class="module-subtitle font-serif">Últimas tendencias en cuanto a bodas.</div>
						</div>
					</div>
					<div class="row multi-columns-row post-columns">
						<!-- NOTAS -->
						<?php 
				$arg = array('category_name' => 'notas', 'showposts' => '3');
				$query = new WP_Query($arg);
				if ($query-> have_posts() ) {
					while ($query-> have_posts() ) {
						$query->the_post(); 						
						$thumb_id = get_post_thumbnail_id();
						$thumb_url = wp_get_attachment_image_src($thumb_id,'medium', true);
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
				} // end if
				?>
							<!--FIN NOTAS-->
					</div>
				</div>
			</section>
			<section class="module" id="contact">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<h2 class="module-title font-alt">Contáctenos</h2>
							<div class="module-subtitle font-serif"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<form id="contactForm" role="form" method="post" action="php/contact.php">
								<div class="form-group">
									<label class="sr-only" for="name">Nombre</label>
									<input class="form-control" type="text" id="name" name="name" placeholder="Nombre*" required="required" data-validation-required-message="Por favor ingrese su nombre." />
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group">
									<label class="sr-only" for="email">E-mail</label>
									<input class="form-control" type="email" id="email" name="email" placeholder="E-mail*" required="required" data-validation-required-message="Por favor ingrese su e-mail." />
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group">
									<textarea class="form-control" rows="7" id="message" name="message" placeholder="Mensaje*" required="required" data-validation-required-message="Por favor ingrese su mensaje..."></textarea>
									<p class="help-block text-danger"></p>
								</div>
								<div class="text-center">
									<button class="btn btn-block btn-round btn-d" id="cfsubmit" type="submit">Enviar</button>
								</div>
							</form>
							<div class="ajax-response font-alt" id="contactFormResponse"></div>
						</div>
					</div>
				</div>
			</section>
			<div class="pt-40 pb-20 bg-dark">
				<!--module-small-->
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="widget">
								<h5 class="widget-title font-alt">Acerca de Tu Invitación Online</h5>
								<p></p>
								<p>Teléfono de contácto: +34 655 608 224</p>
								<p>Email:<a href="#"> info@tuinvitacion.online</a></p>
							</div>
						</div>
						<!--				<div class="col-sm-3">
					<div class="widget">
						<h5 class="widget-title font-alt">Recent Comments</h5>
						<ul class="icon-list">
							<li>Maria on <a href="#">Designer Desk Essentials</a></li>
							<li>John on <a href="#">Realistic Business Card Mockup</a></li>
							<li>Andy on <a href="#">Eco bag Mockup</a></li>
							<li>Jack on <a href="#">Bottle Mockup</a></li>
							<li>Mark on <a href="#">Our trip to the Alps</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="widget">
						<h5 class="widget-title font-alt">Blog Categories</h5>
						<ul class="icon-list">
							<li><a href="#">Photography - 7</a></li>
							<li><a href="#">Web Design - 3</a></li>
							<li><a href="#">Illustration - 12</a></li>
							<li><a href="#">Marketing - 1</a></li>
							<li><a href="#">Wordpress - 16</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="widget">
						<h5 class="widget-title font-alt">Popular Posts</h5>
						<ul class="widget-posts">
							<li class="clearfix">
								<div class="widget-posts-image"><a href="#"><img src="wp-content/uploads/2018/02/rp-1.jpg" alt="Post Thumbnail"/></a></div>
								<div class="widget-posts-body">
									<div class="widget-posts-title"><a href="#">Designer Desk Essentials</a></div>
									<div class="widget-posts-meta">23 january</div>
								</div>
							</li>
							<li class="clearfix">
								<div class="widget-posts-image"><a href="#"><img src="wp-content/uploads/2018/02/rp-2.jpg" alt="Post Thumbnail"/></a></div>
								<div class="widget-posts-body">
									<div class="widget-posts-title"><a href="#">Realistic Business Card Mockup</a></div>
									<div class="widget-posts-meta">15 February</div>
								</div>
							</li>
						</ul>
					</div>
</div>-->
					</div>
				</div>
			</div>
			<hr class="divider-d">
			<?php get_footer(); ?>