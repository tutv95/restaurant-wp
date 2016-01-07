<?php
/**
 * Restaurant WP Theme Customizer.
 *
 * @package Restaurant_WP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function restaurant_wp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}

add_action( 'customize_register', 'restaurant_wp_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function restaurant_wp_customize_preview_js() {
	wp_enqueue_script( 'restaurant_wp_customizer', RESWP_THEME_URL . 'assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}

add_action( 'customize_preview_init', 'restaurant_wp_customize_preview_js' );

require_once RESWP_THEME_DIR . 'inc/admin/customizer-options.php';
require_once RESWP_THEME_DIR . 'inc/admin/customizer-default.php';

/**
 * Print Custom CSS by Customize
 */
function restaurant_wp_customize_css() {
	get_template_part( 'template-parts/custom-style' );
}

add_filter( 'wp_head', 'restaurant_wp_customize_css' );
