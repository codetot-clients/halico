<?php
/**
 * 
 * Template Name: Intro
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

		<section class="section mainbanner">
			<div class="mainbanner-content">
				<?php
					parse_str( parse_url( get_field('intro_video'), PHP_URL_QUERY ), $ytParam );
				?>
				<div class="embed-container">
					<iframe id="mainbannerVideo" src="//www.youtube.com/embed/<?php echo $ytParam['v'];  ; ?>?enablejsapi=1&autoplay=1&mute=1&html5=1" frameborder="0" allowfullscreen ></iframe>
				</div>
			</div>
		</section>

		<section class="section section--normal maincontent">
			<div class="container">
				<?php the_content(); ?>
			</div>
		</section>
		
		<section class="section history">
			<div class="container">
				<h2 class="title-section text-center"><?php _e( 'Lịch sử', 'halico' ); ?></h2>
				<h3 class="subtitle-section text-center"><?php echo get_field('intro_history_bigtitle'); ?></h3>

				<?php
				if( have_rows('intro_history') ):
				?>
				<div class="history__years">
					<?php
						while ( have_rows('intro_history') ) : the_row();
							echo '<div>';
							echo '<h4>'.get_sub_field('intro_history_year').'</h4>';
							echo '<p>'.get_sub_field('intro_history_title').'</p>';
							echo '</div>';
						endwhile;
					?>
				</div>
				<div class="history__contents">
					<?php
						while ( have_rows('intro_history') ) : the_row();
							echo '<div>';
							echo '<p class="history__milestone-title">'.get_sub_field('intro_history_title').'</p>';
							echo get_sub_field('intro_history_content');
							echo '</div>';
						endwhile;
					?>
				</div>
				<?php
				endif;
				?>
				
			</div>
		</section>
		
		<?php
			if( have_rows('intro_banners') ):
		?>
			<section class="section banners">
				<div class="row no-gutters">
				<?php
					while ( have_rows('intro_banners') ) : the_row();
				?>
					<div class="col-md-6 banner__item" style="background-image: url(<?php echo get_sub_field('intro_banner_bg') ?>)">
						<div class="banner__content">
							<h3><?php echo get_sub_field('intro_banner_title') ?></h3>
							<a class="btn btn--white" href="<?php echo get_sub_field('intro_banner_link') ?>"><?php _e( 'Xem chi tiết', 'halico' ); ?></a>
						</div>
					</div>

				<?php
					endwhile;
				?>
				</div>
			</section>
		<?php
			endif;
		?>

		<section class="section section--normal iso">
			<div class="container">
				<h2 class="title-section"><?php _e( 'Hệ thống chứng nhận ISO', 'halico' ); ?></h2>
				<div class="row">
				<?php
					// WP_Query arguments
					$args = array (
						'post_type'              => array( 'iso' ),
						'post_status'            => array( 'publish' ),
						'nopaging'               => true,
						// 'order'                  => 'ASC',
						// 'orderby'                => 'menu_order',
					);

					// The Query
					$isos = new WP_Query( $args );

					// The Loop
					if ( $isos->have_posts() ) {
						while ( $isos->have_posts() ) {
							$isos->the_post();
				?>
						<div class="col-6 col-xl-3 iso__item">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo the_title(); ?>">
							<h3><?php echo the_title(); ?></h3>
							<a class="btn btn--main" href="<?php echo get_the_permalink() ; ?>"><?php _e( 'Xem chi tiết', 'halico' ); ?></a>
						</div>
				<?php
						}
					}

					// Restore original Post Data
					wp_reset_postdata();
				?>
				</div>
			</div>
		</section>

		<section class="section section--normal song" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/intro-bottom-bg.jpg)">
			<div class="container">
				<?php 
				$currentlang = get_bloginfo('language');
			    if($currentlang == "en-US") { ?>
					<img class="song__img" src="http://halico.com.vn/wp-content/uploads/2019/10/Untitled-1-05.png" />
			    <?php } else { ?>
					<img class="song__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/intro-bottom-text.png" />
			    <?php } ?>
				
				<audio controls>
					<source src="<?php echo get_template_directory_uri(); ?>/assets/audio/halico-men-say-hon-viet-nam.mp3" type="audio/mpeg">
				</audio>
			</div>
		</section>
		

		<?php
			endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
