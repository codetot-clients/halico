<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package halico
 */

get_header();
?>

	<div id="primary" class="content-area products">
		<main id="main" class="site-main">
			<div class="container">
				<?php 
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							$imgSrc = get_the_post_thumbnail_url();
							if (!$imgSrc) $imgSrc = wp_get_attachment_url(165);
				?>
				<div class="row">
					<div class="col-xl-9">
						<article class="product__detail">
							<div class="row">
								<div class="col-md-6">
									<div class="product__photo">
										<h2 class="page-title"><?php echo the_title(); ?></h2>
										<h4 class="page-title"><?php echo get_field('p_main_info'); ?></h4>
										<a href="<?php echo $imgSrc; ?>" class="zoom">
											<img class="zoom-original" src="<?php echo $imgSrc; ?>" alt="<?php echo the_title(); ?>">
										</a>
									</div>
								</div>
								<div class="col-md-6 product__info">
									<h2 class="page-title"><?php echo the_title(); ?></h2>
									<h4><?php echo get_field('p_main_info'); ?></h4>
									<p>
										<strong><?php _e( 'Trạng thái', 'halico' ); ?>: </strong> 
										<?php echo get_field('p_state'); ?>
									</p>
									<p>
										<strong><?php _e( 'Màu sắc', 'halico' ); ?>: </strong> 
										<?php
											if( have_rows('p_colors') ):
												while ( have_rows('p_colors') ) : the_row();
													$boderColor = get_sub_field('mau_sắc');
													if ($boderColor == '#ffffff') $boderColor = '#cdcdcd';
													echo '<span class="product__color" style="background-color: '.get_sub_field('mau_sắc').'; border-color: '.$boderColor.'"></span>';
												endwhile;
											endif;
										?>
									</p>
									<p>
										<strong><?php _e( 'Mùi vị', 'halico' ); ?>: </strong> 
										<?php echo get_field('p_smell'); ?>
									</p>
									<div>
										<strong><?php _e( 'Chia sẻ', 'halico' ); ?>: </strong> 
										<div class="fb-share-button" data-href="<?php echo get_the_permalink(); ?>" data-layout="button" data-size="small">
											<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
											<?php _e( 'Chia sẻ', 'halico' ); ?>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="product__title-section"><?php _e( 'Mô tả sản phẩm', 'halico' ); ?></div>
							<?php the_content(); ?>
							<section class="section">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/news.jpg" alt="">
							</section>
						</article>
					</div>
					<div class="col-xl-3 col-sidebar-right">
						<?php dynamic_sidebar( 'tintuc' ); ?>
					</div>
				</div>

				<section class="section section-last">
					<h2 class="title-section text-center"><?php _e( 'Các sản phẩm khác của Halico', 'halico' ); ?></h2>
					<div class="product__other">
					<?php
						// WP_Query arguments
						$args = array (
							'post_type'              => array( 'san_pham' ),
							'post_status'            => array( 'publish' ),
							'posts_per_page'         => 6,
							'orderby'                => 'rand',
						);
						// The Query
						$products = new WP_Query( $args );

						// The Loop
						if ( $products->have_posts() ) :
							while ( $products->have_posts() ) :
								$products->the_post();
					?>
						<div class="product__item">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo the_title(); ?>">
							<h3><?php echo the_title(); ?></h3>
							<p><?php echo get_field('p_main_info'); ?></p>
							<a class="btn btn--main-small" href="<?php echo get_the_permalink() ; ?>"><?php _e( 'Xem chi tiết', 'halico' ); ?></a>
						</div>
					<?php
							endwhile;
						endif;
					?>
					</div>
				</section>
				<?php
						endwhile;
					endif;
				?>
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
