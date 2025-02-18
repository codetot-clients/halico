<?php
/**
 * 
 * Template Name: Awards
 *
 * @package halico
 */

get_header();
?>

	<div id="primary">
		<main id="main" class="site-main">

		<section class="section mainbanner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/thanh-tuu.jpg)">
			<div class="mainbanner-content">
				<!-- <div class="mainbanner-img" ></div> -->
			</div>
		</section>

		<?php
		while ( have_posts() ) :
			the_post();

		?>
		<section class="section section--normal maincontent awards">
			<div class="container">
				<?php the_content(); ?>
				<?php
					if( have_rows('awards') ):
				?>
					<section class="section">
						<?php
							while ( have_rows('awards') ) : the_row();
						?>
							<div class="awards__year"><?php _e( 'Năm', 'halico' ); ?> <?php echo get_sub_field('awards_year') ?></div>
							<div class="row">
								<?php
									if( have_rows('awards_items') ):
										while ( have_rows('awards_items') ) : the_row();
								?>
								<div class="col-md-6 awards__item">
									<div class="media">
										<img src="<?php echo get_sub_field('awards_img') ?>" alt="<?php echo get_sub_field('awards_title') ?>">
										<div class="media-body">
											<h4><?php echo get_sub_field('awards_title') ?></h4>
											<p><?php echo get_sub_field('awards_content') ?></p>
										</div>
									</div>
								</div>
								<?php
										endwhile;
									endif;
								?>
							</div>
						<?php
							endwhile;
						?>
						
					</section>
				<?php
					endif;
				?>
				
			</div>
		</section>

		<?php
			endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
