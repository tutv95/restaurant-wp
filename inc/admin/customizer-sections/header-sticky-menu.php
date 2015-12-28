<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 15/12/2015
 * Time: 11:04 AM
 *
 * Header: Sticky Menu
 *
 * @package Restaurant_WP
 */

$wp_customize->add_section( $prefix . 'sticky_menu', array(
	'title'    => 'Sticky menu',
	'priority' => 10,
	'panel'    => $prefix . 'panel_header',
) );

$wp_customize->add_setting( $prefix . 'sticky_menu', array(
	'default'           => true,
	'sanitize_callback' => 'restaurant_wp_callback',
) );

$wp_customize->add_control( 'restaurant_wp_sticky_menu', array(
	'label'       => esc_html__( 'Sticky menu on scroll', 'restaurant-wp' ),
	'description' => esc_html__( 'Check to enable a fixed header when scrolling, uncheck to disable.', 'restaurant-wp' ),
	'section'     => $prefix . 'sticky_menu',
	'settings'    => $prefix . 'sticky_menu',
	'type'        => 'checkbox',
) );