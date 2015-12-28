<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 16/12/2015
 * Time: 10:27 PM
 *
 * Extension
 *
 * @package Restaurant_WP
 */

$wp_customize->add_section( $prefix . 'display_extension', array(
	'title'       => esc_html__( 'Extension', 'restaurant-wp' ),
	'description' => esc_html__( '', 'restaurant-wp' ),
	'priority'    => 10,
	'panel'       => $prefix . 'panel_display',
) );

/**
 * Back to top
 */
$wp_customize->add_setting( $prefix . 'display_back_to_top', array(
	'default'           => true,
	'sanitize_callback' => 'restaurant_wp_callback',
) );

$wp_customize->add_control( $prefix . 'display_back_to_top', array(
	'label'       => esc_html__( 'Back to top', 'restaurant-wp' ),
	'description' => esc_html__( '', 'restaurant-wp' ),
	'section'     => $prefix . 'display_extension',
	'settings'    => $prefix . 'display_back_to_top',
	'type'        => 'checkbox',
) );

/**
 * Preloader
 */
$wp_customize->add_setting( $prefix . 'display_preloader', array(
	'default'           => true,
	'sanitize_callback' => 'restaurant_wp_callback',
) );

$wp_customize->add_control( $prefix . 'display_preloader', array(
	'label'       => esc_html__( 'Preloader', 'restaurant-wp' ),
	'description' => esc_html__( '', 'restaurant-wp' ),
	'section'     => $prefix . 'display_extension',
	'settings'    => $prefix . 'display_preloader',
	'type'        => 'checkbox',
) );