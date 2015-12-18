<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 18/12/2015
 * Time: 10:34 AM
 *
 * Footer
 *
 * @package Restaurant_WP
 */

$wp_customize->add_section(
	$prefix . 'display_footer',
	array(
		'title'       => esc_html__( 'Footer', 'restaurant-wp' ),
		'description' => esc_html__( '', 'restaurant-wp' ),
		'priority'    => 10,
		'panel'       => $prefix . 'panel_display',
	)
);

/**
 * Footer Background Image
 */
$wp_customize->add_setting(
	$prefix . 'footer_background_image'
);

$wp_customize->add_control(
	new  WP_Customize_Media_Control(
		$wp_customize, $prefix . 'footer_background_image', array(
			'label'     => esc_html__( 'Footer Background Image', 'restaurant-wp' ),
			'section'   => $prefix . 'display_footer',
			'settings'  => $prefix . 'footer_background_image',
			'transport' => 'refresh',
		)
	)
);