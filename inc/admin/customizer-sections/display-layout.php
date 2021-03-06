<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 17/12/2015
 * Time: 8:01 PM
 *
 * Layout
 *
 * @package Restaurant_WP
 */

$wp_customize->add_section( $prefix . 'display_layout', array(
	'title'       => esc_html__( 'Layout', 'restaurant-wp' ),
	'description' => esc_html__( '', 'restaurant-wp' ),
	'priority'    => 10,
	'panel'       => $prefix . 'panel_display',
) );

/**
 * Layout global
 */
$wp_customize->add_setting( $prefix . 'theme_layout', array(
	'default'           => 'right',
	'sanitize_callback' => 'restaurant_wp_callback',
) );

$wp_customize->add_control( $prefix . 'theme_layout', array(
	'label'       => esc_html__( 'Layout', 'restaurant-wp' ),
	'description' => esc_html__( '', 'restaurant-wp' ),
	'section'     => $prefix . 'display_layout',
	'settings'    => $prefix . 'theme_layout',
	'type'        => 'select',
	'choices'     => array(
		'right' => 'Sidebar Right',
		'left'  => 'Sidebar Left',
		'full'  => 'No Sidebar',
	),
	'transport'   => 'refresh',
) );