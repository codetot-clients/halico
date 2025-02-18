<?php
/**
 * 
 * Template Name: Vision & Mission
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
		<section class="section section--normal maincontent vision">
			<div class="container">
					<?php
						if( have_rows('visions') ):
							$row = 0;
							while ( have_rows('visions') ) : the_row();
								$order1 = '';
								$order2 = '';

								if (!$row%2) {
									$order1 = 'order-md-2';
									$order2 = 'order-md-1';
								}
					?>
					<div class="row align-items-center no-gutters vision__item">
						<div class="col-md-6 <?php echo $order1; ?>">
								<div class="vision__content">
									<h2><?php echo get_sub_field('vision_title') ?></h2>
									<h3><?php echo get_sub_field('vision_subtitle') ?></h3>
									<p><?php echo get_sub_field('vision_content') ?></p>
								</div>
						</div>
						<div class="col-md-6 <?php echo $order2; ?>">
							<img src="<?php echo get_sub_field('vision_img') ?>" alt="<?php echo get_sub_field('vision_title') ?>">
						</div>
					</div>
					<?php
							$row++;
							endwhile;
						endif;
					?>
				
			</div>
		</section>

		<section class="section section--normal maincontent value">
			<div class="container">
				<h2 class="title-section text-center"><?php _e( 'Giá trị cốt lõi', 'halico' ); ?></h2>
				<div class="row">
					<?php
						if( have_rows('values') ):
							while ( have_rows('values') ) : the_row();
					?>
					<div class="col-md-4 value__item">
						<img src="<?php echo get_sub_field('value_img') ?>" alt="<?php echo get_sub_field('value_content') ?>">
						<h4><?php echo get_sub_field('value_content') ?></h4>
					</div>
					<?php
							endwhile;
						endif;
					?>
				</div>
			</div>
		</section>

		<?php
			endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
