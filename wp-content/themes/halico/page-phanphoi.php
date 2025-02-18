<?php
/**
 * 
 * Template Name: Distribution
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
		<section class="section section--normal maincontent distribution">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 order-xl-2">
						<?php the_content(); ?>
					</div>
					<div class="col-xl-6 order-xl-1">
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php echo the_title(); ?>">
					</div>
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
