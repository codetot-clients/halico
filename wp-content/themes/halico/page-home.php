<?php
/**
 * 
 * Template Name: Homepage
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

		<section class="section bigbanner">
			<div class="container">
				<div class="bigbanner-content">
					<?php echo get_field('home_banner_content'); ?>
				</div>
			</div>
		</section>

		<section class="section home-intro">
			<div class="section-inner">
				<div class="container">
					<?php echo get_field('home_intro_content'); ?>
					<img src="<?php echo get_field('home_intro_img'); ?>" alt="" class="home-intro__img paroller">
				</div>
			</div>
		</section>

		<section class="section home-network">
			<div class="container">
				<h2 class="title-section"><?php _e( 'Mạng lưới phân phối', 'halico' ); ?></h2>
				<div class="home-network__title">
					<h3><?php echo get_field('home_network_title1'); ?></h3>
					<h3><?php echo get_field('home_network_title2'); ?></h3>
				</div>
				<div class="home-network__head">
					<?php echo get_field('home_office_1'); ?>
				</div>
				<img src="<?php echo get_field('home_office_img'); ?>" alt="" class="home-network__map">
				<div class="home-network__system">
					<?php echo get_field('home_office_2'); ?>
				</div>
			</div>
		</section>

		<section class="section home-taste section-dark">
			<div class="container">
				<h2 class="title-section text-center"><?php _e( 'Hương vị Việt trong từng sản phẩm', 'halico' ); ?></h2>
				<div class="home-taste__title">
					<img src="<?php echo get_field('home_taste_img'); ?>" alt="" class="home-taste__feature paroller3">
					<img src="<?php echo get_field('home_taste_img_title'); ?>" alt="" class="home-taste__imgtitle">
				</div>

				<p class="home-taste__intro text-center">
					<?php echo get_field('home_taste_text'); ?>
				</p>

				<div class="home-taste__content">
					<div class="home-taste__list">
						<ul>
							<?php
								if( have_rows('home_taste_list') ):
									while ( have_rows('home_taste_list') ) : the_row();
										echo '<li>'.get_sub_field('home_taste_item').'</li>';
									endwhile;
								endif;
							?>
						</ul>
						<div class="home-taste__bottles">
							<?php
								/*if( have_rows('home_taste_bottles') ):
									while ( have_rows('home_taste_bottles') ) : the_row();
										echo '<span>';
										echo '<img src="' . get_template_directory_uri() . '/assets/images/icon-bottle.svg" width="10" />';
										echo get_sub_field('home_taste_bottle');
										echo '</span>';
									endwhile;
								endif;*/
							?>
						</div>

					</div>
					<img src="<?php echo get_field('home_taste_img_wine'); ?>" alt="" class="home-taste__imgwine paroller">
				</div>
				<?php 
				$currentlang = get_bloginfo('language');
			    if($currentlang == "en-US") { ?>
					<a href="http://halico.com.vn/en/san_pham/" class="btn btn--white"><?php _e( 'Xem toàn bộ sản phẩm', 'halico' ); ?></a>
			    <?php } else { ?>
					<a href="http://halico.com.vn/san_pham/" class="btn btn--white"><?php _e( 'Xem toàn bộ sản phẩm', 'halico' ); ?></a>
			    <?php } ?>
				
				
			</div>
		</section>

		<section class="section home-step">
			<div class="container">
				<img src="<?php echo get_field('home_step_img'); ?>" alt="" class="home-step__img paroller">
				<h2 class="title-section"><?php _e( 'Bước tiếp trăm năm', 'halico' ); ?></h2>
				<div class="home-step__content">
					<?php echo get_field('home_step_text'); ?>	
				</div>
				
			</div>
		</section>

		<section class="section home-technology">
			<div class="container">
				<h3><?php the_field('home_technology'); ?></h3>
				<div class="tech-slider">
					<div class="tech-item">
						<div class="tech-img">
							<img src="<?php the_field('home_technology_image_1'); ?>" alt=""/>
						</div>
						<div class="tech-content">
							<?php the_field('home_technology_content_1'); ?>
						</div>
					</div>
					<div class="tech-item">
						<div class="tech-img">
							<img src="<?php the_field('home_technology_image_2'); ?>" alt=""/>
						</div>
						<div class="tech-content">
							<?php the_field('home_technology_content_2'); ?>
						</div>
					</div>
					<div class="tech-item">
						<div class="tech-img">
							<img src="<?php the_field('home_technology_image_3'); ?>" alt=""/>
						</div>
						<div class="tech-content">
							<?php the_field('home_technology_content_3'); ?>
						</div>
					</div>
					<div class="tech-item">
						<div class="tech-img">
							<img src="<?php the_field('home_technology_image_4'); ?>" alt=""/>
						</div>
						<div class="tech-content">
							<?php the_field('home_technology_content_4'); ?>
						</div>
					</div>
					<div class="tech-item">
						<div class="tech-img">
							<img src="<?php the_field('home_technology_image_5'); ?>" alt=""/>
						</div>
						<div class="tech-content">
							<?php the_field('home_technology_content_5'); ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="section home-news">
			<div class="container">
				<div class="home-news__list">
					<h2 class="title-section"><?php _e( 'Tin tức', 'halico' ); ?></h2>
					<?php 
						// get news 
						global $post;
						$args = array( 'posts_per_page' => 12 );
						$news = get_posts( $args );
					?>
					<div class="row home-news__slide">
					<?php
						$i = 0;

						foreach ( $news as $post ) : setup_postdata( $post );

							// if ($i%4 == 0) {
							// 	echo '<div class="home-news__slide-item">';
							// 	echo '<div class="row">';
							// }
							$i++;
					?>
						<!-- <div class="home-news__slide-item"> -->
							<!-- <div class="col col-lg-3"> -->
								<article class="home-news__item">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'medium' ); ?>
									</a>
									<h3 class="article__title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<?php echo excerptByWord(30); ?>
									<a href="<?php the_permalink(); ?>" class="article__more">
										<span><?php _e( 'Đọc thêm', 'halico' ); ?></span>
									</a>
								</article>
							<!-- </div> -->
						<!-- </div> -->
					<?php 
							// if ($i%4 == 0) echo '</div></div>'; 
					
						endforeach; 

						// if ($i%4 != 0) echo '</div></div>'; 
						wp_reset_postdata();
					?>
					</div>
					<div class="home-news__slide__arrows">
						<a href="javascript:void(0)" class="prev">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.svg" width="25" />
						</a>
						<a href="javascript:void(0)" class="next">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right.svg" width="25" />
						</a>
					</div>
				</div>
			</div>
		</section>

		<section class="section home-iso section-dark">
			<div class="container">
				<h2 class="title-section"><?php _e( 'Hệ thống chứng nhận ISO', 'halico' ); ?></h2>
				<div class="home-news__list">
					<?php
						if( have_rows('home_cert') ):
							while ( have_rows('home_cert') ) : the_row();
								echo '<span>';
								echo '<img src="' . get_sub_field('home_cert_item') . '" />';
								echo '</span>';
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
