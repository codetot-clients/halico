<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package halico
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function halico_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'halico_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function halico_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'halico_pingback_header' );

// except
function halico_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'halico_excerpt_length', 999 );

function halico_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'halico_excerpt_more' );

/*
function halico_cookie18() { 
	if(!isset($_COOKIE['halico_18'])) {
		// set a cookie for 1 year
		setcookie('halico_18', 1, time()+31556926);
	}
	// unset cookie
	// setcookie('halico_18', null, strtotime('-1 day'));
} 
add_action('init', 'halico_cookie18');
*/
// unset cookie
	// setcookie('halico_18', null, strtotime('-1 day'));


/* custom pagination */
function halico_posts_nav() {

	if( is_singular() )
		return;
	
	global $wp_query;
	
	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;
	
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );
	
	/** Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;
	
	/** Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}
	
	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}
	
	echo '<div class="page-nav"><ul>' . "\n";
	
	/** Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="nav-prev">%s</li>' . "\n", get_previous_posts_link('<img src="'.get_template_directory_uri() . '/assets/images/arrow.svg'.'" width="20" />') );
	
	/** Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';
	
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
	
		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}
	
	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}
	
	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";
	
		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}
	
	/** Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li class="nav-next">%s</li>' . "\n", get_next_posts_link('<img src="'.get_template_directory_uri() . '/assets/images/arrow.svg'.'" width="20" />') );
	
	echo '</ul></div>' . "\n";
	
}

// filter posts by year from URL
add_action( 'pre_get_posts', 'halico_filter_by_year' );
function halico_filter_by_year($query) {
	$year = (isset($_GET['y'])) ? intval($_GET['y']) : '';
	if ( $year && ! is_admin() && $query->is_main_query() ) {
		$query->set( 'year', $year );
	}
}

// override search widget
function halico_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.__( 'Nội dung tìm kiếm ...', 'halico' ).'" />
	<input type="submit" id="searchsubmit" value="" />
	
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'halico_search_form', 100 );

// Changing The Excerpt Length
function wpdocs_custom_excerpt_length( $length ) {
    return 70;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function excerptByWord($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	  array_pop($excerpt);
	  $excerpt = implode(" ",$excerpt).'...';
	} else {
	  $excerpt = implode(" ",$excerpt);
	}	
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
  }

function contentByWord($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
	  array_pop($content);
	  $content = implode(" ",$content).'...';
	} else {
	  $content = implode(" ",$content);
	}	
	$content = preg_replace('/[.+]/','', $content);
	$content = apply_filters('the_content', $content); 
	$content = str_replace(']]>', ']]>', $content);
	return $content;
}


add_action( 'pre_get_posts', 'custom_query_san_pham' );
function custom_query_san_pham( $query ) {
    if ( !is_admin() && $query->is_main_query() ) {
		if ( is_post_type_archive('san_pham') ) {
			$query->set( 'posts_per_page', -1 );
		}
	}
	return $query;
}

function myphpinformation_scripts() {
	if( !is_admin()){
		wp_deregister_script('jquery');
		// wp_register_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js', false);
		// wp_enqueue_script('jquery');
	}
}
add_action( 'wp_enqueue_scripts', 'myphpinformation_scripts' );