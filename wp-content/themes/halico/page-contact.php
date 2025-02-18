<?php
/**
 * 
 * Template Name: Contact
 *
 * @package halico
 */

get_header();
?>

	<div id="primary">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

		?>

		<section class="section section--normal maincontent contact">
			<div class="container">
				<h2 class="page-title text-center"><?php _e( 'Liên hệ với Halico', 'halico' ); ?></h2>
				<div class="row">
					<div class="col-xl-5">
						<?php the_content(); ?>
						<div class="contact__list">
							<div class="contact__item">
								<span class="icon icon-address"></span>
								<span><?php echo get_field('contact_address'); ?></span>
							</div>
							<div class="contact__item">
								<span class="icon icon-phone"></span>
								<?php echo get_field('contact_phone'); ?>
							</div>
							<div class="contact__item">
								<span class="icon icon-mail"></span>
								<?php echo get_field('contact_mail'); ?>
							</div>
							<div class="contact__item">
								<span class="icon icon-facebook"></span>
								<a href="<?php echo get_field('contact_fanpage'); ?>" title="Fanpage" target="_blank">
									<?php echo get_field('contact_fanpage'); ?>
								</a>
							</div>
						</div>
					</div>
					<div class="col-xl-7 contact__form">
						<p><?php echo get_field('contact_desc'); ?></p>
						<div class="contact__form__item">
							<?php 
								if (get_locale() == 'vi') {
									echo do_shortcode( '[contact-form-7 id="311" title="Liên hệ"]' ); 
								} elseif (get_locale() == 'en_US') {
									echo do_shortcode( '[contact-form-7 id="381" title="Contact"]' ); 
								}
							?>
						</div>
						
					</div>
				</div>
				
			</div>
		</section>

		<section class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.455494659561!2d105.85498931466519!3d21.014452986006123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abf3c6c96a2d%3A0x6d72ba0808499f76!2zOTQgTMOyIMSQw7pjLCBQaOG6oW0gxJDDrG5oIEjhu5UsIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1565847914783!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</section>

		<?php
			endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();