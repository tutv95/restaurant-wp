<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 15/12/2015
 * Time: 6:29 PM
 *
 * Colors
 *
 * @package Restaurant_WP
 */

$wp_customize->add_section( $prefix . 'typography_color', array(
	'title'       => esc_html__( 'Colors', 'restaurant-wp' ),
	'description' => esc_html__( '', 'restaurant-wp' ),
	'priority'    => 15,
	'panel'       => $prefix . 'typography',
) );

/**
 * Primary color
 */
$wp_customize->add_setting( $prefix . 'primary_color', array(
	'default'           => '#f27935',
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . 'primary_color', array(
	'label'       => esc_html__( 'Primary color', 'restaurant-wp' ),
	'description' => esc_html__( 'Pick a text color for primary color.', 'restaurant-wp' ),
	'section'     => $prefix . 'typography_color',
	'settings'    => $prefix . 'primary_color',
) ) );