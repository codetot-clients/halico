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

	<div id="primary" class="content-area news">
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
						<h2 class="page-title text-center"><?php echo the_title(); ?></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-9">
						<article class="news__detail">
							<?php the_content(); ?>
						</article>
					</div>
					<div class="col-xl-3 col-sidebar-right">
						<?php dynamic_sidebar( 'tintuc' ); ?>
						<!-- bài viết liên quan -->
						<section class="widget recent-posts-widget-with-thumbnails">
							<h2 class="widget-title">Tin liên quan</h2>
							<div class="widget-content">
								<ul>
									<?php
										$categories = get_the_category(get_the_ID());
										if ($categories){
								    		$category_ids = array();
								    		foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
										    $args=array(
										        'category__in' => $category_ids,
										        'post__not_in' => array(get_the_ID()),
										        'posts_per_page' => 5,
										    );
								    		$my_query = new wp_query($args);
								    		if( $my_query->have_posts() ):
								        		while ($my_query->have_posts()):$my_query->the_post();
								    		?>
												<li>
													<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
														<?php the_post_thumbnail("medium"); ?>
														<span class="rpwwt-post-title"><?php the_title(); ?></span>
													</a>
													<div class="rpwwt-post-excerpt">
														<?php echo wp_trim_words( get_the_excerpt(), 10 ); ?>
													</div>
												</li>
											<?php
								        		endwhile;
											endif; 
										wp_reset_query();
										}
									?>
								</ul>
							</div>
							
						</section>
						
					</div>
				</div>
				<?php
						endwhile;
					endif;
				?>
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
