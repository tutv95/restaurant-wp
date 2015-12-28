<?php
/**
 * Created by PhpStorm.
 * User: never
 * Date: 12/11/2015
 * Time: 8:07 AM
 *
 * Header: Sub menu
 *
 * @package Restaurant_WP
 */

// Sub menu
$wp_customize->add_section( $prefix . 'sub_menu', array(
	'title'    => esc_html__( 'Sub menu', 'restaurant-wp' ),
	'priority' => 10,
	'panel'    => $prefix . 'panel_header',
) );

$wp_customize->add_setting( $prefix . 'sub_menu_background_color', array(
	//		'type'    => 'option',
	'default'           => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . 'sub_menu_background_color', array(
	'label'       => esc_html__( 'Background color', 'restaurant-wp' ),
	'description' => esc_html__( 'Pick a background color for sub menu', 'restaurant-wp' ),
	'section'     => $prefix . 'sub_menu',
	'settings'    => $prefix . 'sub_menu_background_color',
) ) );

$wp_customize->add_setting( $prefix . 'sub_menu_text_color', array(
	//		'type'    => 'option',
	'default'           => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . 'sub_menu_text_color', array(
	'label'       => esc_html__( 'Text color', 'restaurant-wp' ),
	'description' => esc_html__( 'Pick a text color for sub menu', 'restaurant-wp' ),
	'section'     => $prefix . 'sub_menu',
	'settings'    => $prefix . 'sub_menu_text_color',
) ) );

$wp_customize->add_setting( $prefix . 'sub_menu_text_color_hover', array(
	//		'type'    => 'option',
	'default'           => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . 'sub_menu_text_color_hover', array(
	'label'       => esc_html__( 'Text color hover', 'restaurant-wp' ),
	'description' => esc_html__( 'Pick a text color hover for sub menu', 'restaurant-wp' ),
	'section'     => $prefix . 'sub_menu',
	'settings'    => $prefix . 'sub_menu_text_color_hover',
) ) );

