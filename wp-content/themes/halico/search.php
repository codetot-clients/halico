<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package halico
 */

get_header();
?>

	<div id="primary" class="content-area news">
		<main id="main" class="site-main">
			<div class="container">
				<h2 class="page-title">
					<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Kết quả tìm kiếm: %s', 'halico' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h2>
				<div class="row">
					<div class="col-xl-9">
						<?php if ( have_posts() ) : ?>
							<?php
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
									$imgSrc = get_the_post_thumbnail_url(get_the_ID(), 'medium');
									if (!$imgSrc) $imgSrc = wp_get_attachment_url(165);
							?>
									<article class="news__item media">
										<a href="<?php echo get_permalink(); ?>">
											<img class="news__thumb" src="<?php echo $imgSrc; ?>" alt="<?php the_title(); ?>">
										</a>
										<div class="media-body">
											<h3 class="news__title">
												<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
											</h3>
											<p class="post-time"><?php the_time('d/m/Y'); ?></p>
											<?php the_excerpt(); ?>
											<a class="btn btn--main-small" href="<?php echo get_permalink(); ?>"><?php _e( 'Đọc thêm', 'halico' ); ?></a>
										</div>
									</article>
							<?php
									
								endwhile;

								// start pagination
								halico_posts_nav();
								
							endif;
						?>
					</div>
					<div class="col-xl-3 col-sidebar-right">
						<?php dynamic_sidebar( 'tintuc' ); ?>
					</div>
				</div>
				<?php 
					$bannerBottom = get_field('news_banner_bottom', $category);
					if ($bannerBottom) :
				?>
				<section class="section-last">
					<img src="<?php echo $bannerBottom; ?>" alt="">
				</section>
				<?php
					endif;
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
