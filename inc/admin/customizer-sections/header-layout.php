<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 15/12/2015
 * Time: 10:46 AM
 *
 * Header Layout
 *
 * @package Restaurant_WP
 */

$wp_customize->add_section(
	$prefix . 'header_layout',
	array(
		'title'       => esc_html__( 'Header layout', 'restaurant-wp' ),
		'description' => esc_html__( '', 'restaurant-wp' ),
		'priority'    => 10,
		'panel'       => $prefix . 'panel_header',
	)
);

$wp_customize->add_setting(
	$prefix . 'header_style',
	array(
		'default' => 'value2',
	)
);

$wp_customize->add_control(
	$prefix . 'header_display',
	array(
		'label'       => esc_html__( 'Header position', 'restaurant-wp' ),
		'description' => esc_html__( 'Overlay: Header will overlay other components below', 'restaurant-wp' ),
		'section'     => $prefix . 'header_layout',
		'settings'    => $prefix . 'header_style',
		'type'        => 'select',
		'choices'     => array(
			'value1' => 'Default',
			'value2' => 'Overlay',
		),
	)
);

$wp_customize->add_setting(
	$prefix . 'header_background_color',
	array(
		'default'           => '#fff',
		//'type'              => 'option',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, $prefix . 'header_background_color', array(
			'label'       => esc_html__( 'Header background color', 'restaurant-wp' ),
			'description' => esc_html__( 'Pick a background color for header', 'restaurant-wp' ),
			'section'     => $prefix . 'header_layout',
			'settings'    => $prefix . 'header_background_color',
		)
	)
);