<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package halico
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row footer-main">
				<div class="d-none d-lg-block col-lg-3">
					<?php the_custom_logo(); ?>
				</div>
				<div class="col-4 col-lg-3">
					<nav class="footer-navigation">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-footer1',
							'menu_id'        => 'menu-footer1',
						) );
						?>
					</nav>
				</div>
				<div class="col-3 col-lg-3">
					<nav class="footer-navigation">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-footer2',
							'menu_id'        => 'menu-footer2',
						) );
						?>
					</nav>
				</div>
				<div class="col-5 col-lg-3">
					<div class="footer-title"><?php _e( 'Địa chỉ liên hệ', 'halico' ); ?></div>
					<div class="footer-address">
						<?php 
						$currentlang = get_bloginfo('language');
					    if($currentlang == "en-US") {
					    	echo "94 Lo Duc, Pham Dinh Ho, Hai Ba Trung, Hanoi";
					    } else {
					    	echo "94 Lò Đúc, Phạm Đình Hổ, Hai Bà Trưng, Hà Nội";
					    } ?>
					</div>
					<div class="footer-title"><?php _e( 'Điện thoại', 'halico' ); ?></div>
					<div class="footer-phone"><?php echo get_theme_mod('hlc_phone', 'halico'); ?></div>

				</div>
			</div>
			<div class="row">
				<div class="col copyright">
					copyright 2019©Halico
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-inview@1.1.2/jquery.inview.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>


<?php wp_footer(); ?>

</body>
</html>
