<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package halico
 */

get_header();
// $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
// $layout = get_field('codong_layout', $term->taxonomy . '_' . $term->term_id);
// if (!$layout) $layout = 1;
$layout = 1;

$year = (isset($_GET['y'])) ? intval($_GET['y']) : '';
?>
	<div id="primary" class="content-area codong codong_layout<?php echo $layout; ?>">
		<main id="main" class="site-main">
			<div class="container">
				<?php
					$mainContentClass = "col-lg-12";
					$sidebarClass = "col-lg-3";
					if ( is_active_sidebar( 'codong' ) ) $mainContentClass = "col-lg-9";
				?>
				<div class="row">
					<!-- main content -->
					<div class="order-lg-2 <?php echo $mainContentClass; ?>">
						<h2 class="page-title">
							<?php _e( 'Công bố chất lượng', 'halico' ); ?>
							<span class="page-filter">
								<select name="" id="codongFilter" class="input-select">
									<option value=""><?php _e( 'Lọc theo năm', 'halico' ); ?></option>
									<?php for ($i=2014;$i<=date("Y");$i++): ?>
										<option value="<?php echo $i; ?>" <?php echo ($i==$year) ? 'selected' : ''; ?>><?php echo $i; ?></option>
									<?php endfor; ?>
								</select>
							</span>
						</h2>

						<div class="row codong__list">
						<?php if ( have_posts() ) : ?>
							<?php
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
									$imgSrc = get_the_post_thumbnail_url();
									if (!$imgSrc) $imgSrc = wp_get_attachment_url(165);
							?>
								<div class="col-12 <?php echo ($layout==2) ? 'col-lg-6' : ''; ?>">
									<article class="codong__item media">
										<img class="codong__thumb" src="<?php echo $imgSrc; ?>" alt="<?php the_title(); ?>">
										<div class="media-body">
											<h3 class="codong__title"><?php the_title(); ?></h3>
											<a class="codong__btn" href="<?php echo get_field('codong_file'); ?>" target="_blank"><?php _e( 'Tải về', 'halico' ); ?></a>
										</div>
									</article>
								</div>
								
							<?php
									
								endwhile;

								// start pagination
								halico_posts_nav();
								
							endif;
							?>
							</div>
					</div>
					<!-- /main content -->

					<!-- sidebar -->
					<?php
						if ( is_active_sidebar( 'congbochatluong' ) ) :
					?>
						<div class="order-lg-1 col-sidebar <?php echo $sidebarClass; ?>">
							<?php dynamic_sidebar( 'congbochatluong' ); ?>
						</div>
					<?php
						endif;
					?>
					<!-- /sidebar -->
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
