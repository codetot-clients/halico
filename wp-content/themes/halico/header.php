<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package halico
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<?php wp_head(); ?>

	<!-- disable copy -->
	<!-- <style>
	body {
	-webkit-touch-callout: none;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	}
	</style>
	
	<script type="text/javascript">
		//<=!=[=C=D=A=T=A=[
		document.onkeypress = function(event) {
		event = (event || window.event);
		if (event.keyCode === 123) {
		//alert('No F-12');
		return false;
		}
		};
		document.onmousedown = function(event) {
		event = (event || window.event);
		if (event.keyCode === 123) {
		//alert('No F-keys');
		return false;
		}
		};
		document.onkeydown = function(event) {
		event = (event || window.event);
		if (event.keyCode === 123) {
		//alert('No F-keys');
		return false;
		}
		};
	
		function contentprotector() {
		return false;
		}
		function mousehandler(e) {
		var myevent = (isNS) ? e : event;
		var eventbutton = (isNS) ? myevent.which : myevent.button;
		if ((eventbutton === 2) || (eventbutton === 3))
		return false;
		}
		document.oncontextmenu = contentprotector;
		document.onmouseup = contentprotector;
		var isCtrl = false;
		window.onkeyup = function(e)
		{
		if (e.which === 17)
		isCtrl = false;
		}
	
		window.onkeydown = function(e)
		{
		if (e.which === 17)
		isCtrl = true;
		if (((e.which === 85) || (e.which === 65) || (e.which === 88) || (e.which === 67) || (e.which === 86) || (e.which === 83)) && isCtrl === true)
		{
		return false;
		}
		}
		isCtrl = false;
		document.ondragstart = contentprotector;
		//]=]=>
	</script> -->
	<!-- end disable copy -->

</head>

<body <?php body_class(); ?>>

	<?php 
		// POPUP 18 age
		if(!isset($_COOKIE['halico_18'])) : 
	?>
		<div id="modal18" class="modal18">
			<?php the_custom_logo(); ?>
			<div class="modal18__first">
				<div class="modal18__content">
					<?php
						$page18 = get_pages( array(
							'post_type' => 'page',
							'meta_key' => '_wp_page_template',
							'meta_value' => 'page-18.php'
						));
						echo $page18[0]->post_content;
					?>
				</div>
				<div class="button18_excerpt">
					<button class="btn-duoi18" type="button">Dưới 18 tuổi</button>
					<button class="btn-tren18" type="button">Trên 18 tuổi</button>
				</div>
				<!-- <form action="" class="modal18__frm">
					<div class="row">
						<input type="number" name="day" class="modal18__input" placeholder="DD" min="1" max="31">
						<input type="number" name="month" class="modal18__input"  placeholder="MM" min="1" max="12">
						<input type="number" name="year" class="modal18__input"  placeholder="YYYY" min="1930" max="2100">
					</div>
					<div class="row">
						<input type="button" value="<?php //_e( 'Vào trang', 'halico' ); ?>" class="modal18__button">
					</div>
					<div class="row modal18__checkrow">
						<input type="checkbox" name="remember" class="modal18__checkbox" id="modal18__checkbox"> 
						<label for="modal18__checkbox"><?php //_e( 'Nhớ thông tin của tôi', 'halico' ); ?></label>
					</div>
				</form> -->
			</div>
			<div class="modal18__not">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bottle-glass.png" alt="" width="66">
				<h3>Xin lỗi bạn về sự bất tiện này,</h3>
				<h3>vui lòng quay lại khi bạn đã đủ 18 tuổi</h3>
			</div>
		</div>
	<?php endif; // end POPUP 18 age ?>

	<header id="masthead" class="site-header">

	<!-- Load Facebook SDK for JavaScript -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>


		<div class="container">
			<a href="javascript:void(0)" class="menu-icon">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/menu.svg" alt="menu" width="32">
			</a>
			<a href="javascript:void(0)" class="menu-close">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="close" width="26">
			</a>
			<?php the_custom_logo(); ?>
			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'menu-main',
				) );
				?>
			</nav><!-- #site-navigation -->
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-lang',
					'menu_id'        => 'menu-lang',
				) );
			?>
		</div>
	</header><!-- #masthead -->

