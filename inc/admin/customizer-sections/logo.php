<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 15/12/2015
 * Time: 2:52 PM
 *
 * Logo
 *
 * @package Restaurant_WP
 */

$prefix = 'restaurant_wp_';

/**
 * Header logo
 */
$wp_customize->add_setting( $prefix . 'header_logo', array(
	'sanitize_callback' => 'restaurant_wp_callback',
) );

$wp_customize->add_control( new  WP_Customize_Media_Control( $wp_customize, $prefix . 'header_logo', array(
	'label'    => esc_html__( 'Header Logo', 'restaurant-wp' ),
	'section'  => 'title_tagline',
	'settings' => $prefix . 'header_logo',
) ) );

/**
 * Sticky logo
 */
$wp_customize->add_setting( $prefix . 'sticky_logo', array(
	'sanitize_callback' => 'restaurant_wp_callback',
) );

$wp_customize->add_control( new  WP_Customize_Media_Control( $wp_customize, $prefix . 'sticky_logo', array(
	'label'    => esc_html__( 'Sticky Logo', 'restaurant-wp' ),
	'section'  => 'title_tagline',
	'settings' => $prefix . 'sticky_logo',
) ) );

/**
 * Width logo
 */
$wp_customize->add_setting( $prefix . 'width_logo', array(
	'default'           => 150,
	'sanitize_callback' => 'restaurant_wp_callback',
) );


$wp_customize->add_control( $prefix . 'width_logo', array(
	'type'        => 'number',
	'section'     => 'title_tagline',
	'label'       => esc_html__( 'Width Logo', 'restaurant-wp' ),
	'description' => esc_html__( 'Unit is px.', 'restaurant-wp' ),
	'input_attrs' => array(
		'min'  => 0,
		'max'  => 500,
		'step' => 1,
	),
) );