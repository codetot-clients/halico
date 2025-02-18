<?php
/**
 * halico functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package halico
 */
add_filter('use_block_editor_for_post', '__return_false');
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );
if ( ! function_exists( 'halico_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function halico_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on halico, use a find and replace
		 * to change 'halico' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'halico', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'halico' ),
			'menu-lang' => esc_html__( 'Language', 'halico' ),
			'menu-footer1' => esc_html__( 'Footer 01', 'halico' ),
			'menu-footer2' => esc_html__( 'Footer 02', 'halico' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'halico_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'halico_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function halico_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'halico_content_width', 640 );
}
add_action( 'after_setup_theme', 'halico_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function halico_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'halico' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'halico' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2><div class="widget-content">',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'CoDong_Sidebar', 'halico' ),
		'id'            => 'codong',
		'description'   => esc_html__( 'Add widgets here.', 'halico' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2><div class="widget-content">',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'CongBoChatLuong_Sidebar', 'halico' ),
		'id'            => 'congbochatluong',
		'description'   => esc_html__( 'Add widgets here.', 'halico' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2><div class="widget-content">',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Tintuc_Sidebar', 'halico' ),
		'id'            => 'tintuc',
		'description'   => esc_html__( 'Add widgets here.', 'halico' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2><div class="widget-content">',
	) );
}
add_action( 'widgets_init', 'halico_widgets_init' );

/**
 * Enqueue scripts and styles.
 */ 
function halico_scripts() {
	wp_enqueue_style( 'halico-style', get_stylesheet_uri() );
	wp_enqueue_style( 'halico-style-main', get_template_directory_uri() . '/assets/css/maina.css');
    wp_enqueue_style( 'responsive-style-main', get_template_directory_uri() . '/assets/css/responsive.css');
	wp_enqueue_script( 'halico-script-parallax', get_template_directory_uri() . '/js/jquery.paroller.min.js', array(), '20190707', true );
	wp_enqueue_script( 'halico-script', get_template_directory_uri() . '/js/main.js', array(), '20190707', true );
	
	
}
add_action( 'wp_enqueue_scripts', 'halico_scripts' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// custom function
add_action( 'init', 'update_my_custom_type', 99 );

function update_my_custom_type() {
    global $wp_post_types;

    if ( post_type_exists( 'san_pham' ) ) {

        // exclude from search results
        $wp_post_types['san_pham']->exclude_from_search = true;
    }
}