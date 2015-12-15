<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 15/12/2015
 * Time: 11:05 AM
 *
 * Header: Mobile Menu
 *
 * @package Restaurant_WP
 */

$wp_customize->add_section(
	$prefix . 'mobile_menu',
	array(
		'title' => esc_html__( 'Mobile menu', 'restaurant-wp' ),
		'panel' => $prefix . 'panel_header',
	)
);

$wp_customize->add_setting(
	$prefix . 'mobile_menu_background_color',
	array(
		'type'    => 'option',
		'default' => '#fff',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, $prefix . 'mobile_menu_background_color', array(
			'label'       => esc_html__( 'Background color ', 'restaurant-wp' ),
			'description' => esc_html__( 'Pick a background color  for sub menu', 'restaurant-wp' ),
			'section'     => $prefix . 'mobile_menu',
			'settings'    => $prefix . 'mobile_menu_background_color',
		)
	)
);

$wp_customize->add_setting(
	$prefix . 'mobile_menu_text_color',
	array(
		'type'    => 'option',
		'default' => '#fff',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, $prefix . 'mobile_menu_text_color', array(
			'label'       => esc_html__( 'Text color ', 'restaurant-wp' ),
			'description' => esc_html__( 'Pick a text color  for mobile menu', 'restaurant-wp' ),
			'section'     => $prefix . 'mobile_menu',
			'settings'    => $prefix . 'mobile_menu_text_color',
		)
	)
);

$wp_customize->add_setting(
	$prefix . 'mobile_menu_text_color_hover',
	array(
		'type'    => 'option',
		'default' => '#fff',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, $prefix . 'mobile_menu_text_color_hover', array(
			'label'       => esc_html__( 'Text color hover', 'restaurant-wp' ),
			'description' => esc_html__( 'Pick a text color hover for mobile menu', 'restaurant-wp' ),
			'section'     => $prefix . 'mobile_menu',
			'settings'    => $prefix . 'mobile_menu_text_color_hover',
		)
	)
);