<?php
/**
 * halico Theme Customizer
 *
 * @package halico
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function halico_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'halico_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'halico_customize_partial_blogdescription',
		) );
	}

	/* Theme options */

	// add section
	$wp_customize->add_section( 'halico_section' , array(
		'title'      => 'Halico setting',
		'priority'   => 30,
	) );

	// Text before logo
	$wp_customize->add_setting( 'hlc_address' , array(
		'default'   => '94 Lò Đúc',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(
		'hlc_address',
		array(
			'label'   => __( 'Địa chỉ', 'halico' ),
			'section' => 'halico_section',
			'type'    => 'text',
		)
	);

	// Text after logo
	$wp_customize->add_setting( 'hlc_phone' , array(
		'default'   => '09x',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(
		'hlc_phone',
		array(
			'label'   => __( 'Điện thoại', 'halico' ),
			'section' => 'halico_section',
			'type'    => 'text',
		)
	);

}
add_action( 'customize_register', 'halico_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function halico_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function halico_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function halico_customize_preview_js() {
	wp_enqueue_script( 'halico-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'halico_customize_preview_js' );
