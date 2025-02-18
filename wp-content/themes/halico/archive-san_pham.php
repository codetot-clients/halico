<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package halico
 */

get_header();

$category = get_queried_object();
$catName = $category->name;
?>

	<div id="primary" class="products">
		<section class="mainbanner">
			<div class="container">
				<?php 
				$currentlang = get_bloginfo('language');
			    if($currentlang == "en-US") { ?>
					<img class="banner__text" src="http://halico.com.vn/wp-content/uploads/2019/10/Untitled-1-06.png" alt="">
			    <?php } else { ?>
					<img class="banner__text" src="<?php echo get_template_directory_uri(); ?>/assets/images/product-text.png" alt="">
			    <?php } ?>
				
				<img class="banner__text--mb" src="<?php echo get_template_directory_uri(); ?>/assets/images/product-text-mb.png" alt="">
				<img class="banner__w1" src="<?php echo get_template_directory_uri(); ?>/assets/images/product_banner_1.png" alt="">
				<img class="banner__w2" src="<?php echo get_template_directory_uri(); ?>/assets/images/product_banner_2.png" alt="">
				<img class="banner__w2--mb" src="<?php echo get_template_directory_uri(); ?>/assets/images/product_banner-mb.png" alt="">
				
			</div>
			<img class="banner__bottom" src="<?php echo get_template_directory_uri(); ?>/assets/images/roundround.png" alt="">
		</section>
		<main id="main" class="site-main">
			<div class="container">
				<section class="section section--normal">
				<h2 class="page-title text-center"><?php _e( 'Sản phẩm', 'halico' ); ?></h2>
				<div class="product__slideshow">
				<?php 
					if ( have_posts() ) : 
						$i = 0;

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							$imgSrc = get_the_post_thumbnail_url();
							if (!$imgSrc) $imgSrc = wp_get_attachment_url(165);
							
							if ($i%8 == 0) {
								echo '<div class="product__slideshow-item">';
								echo '<div class="row product__list row-eq-height no-gutters">';
							}
							$i++;
				?>
								<div class="col-6 col-md-4 col-xl-3">
									<article class="product__item">
										<a href="<?php echo get_permalink(); ?>"><img class="product__thumb" src="<?php echo $imgSrc; ?>" alt="<?php the_title(); ?>"></a>
										<div class="product__content">
											<h3 class="product__title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
											<p><?php echo get_field('p_main_info'); ?></p>
											<a class="btn btn--main-small" href="<?php echo get_permalink(); ?>"><?php _e( 'Xem chi tiết', 'halico' ); ?></a>
										</div>
									</article>
								</div>
							<?php
							
							if ($i%8 == 0) echo '</div></div>';

						endwhile;

						if ($i%8 != 0) echo '</div></div>';

					endif;
				?>
				</div>	

				<section class="section">
					<?php 
					$currentlang = get_bloginfo('language');
				    if($currentlang == "en-US") { ?>
						<img src="http://halico.com.vn/wp-content/uploads/2019/10/PRODUCT.png" alt="">
				    <?php } else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/news.jpg" alt="">
				    <?php } ?>
					
				</section>

				</section>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
