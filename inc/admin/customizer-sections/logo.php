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
$wp_customize->add_setting(
	$prefix . 'header_logo'
);

$wp_customize->add_control(
	new  WP_Customize_Media_Control(
		$wp_customize, $prefix . 'header_logo', array(
			'label'    => esc_html__( 'Header Logo', 'restaurant-wp' ),
			'section'  => 'title_tagline',
			'settings' => $prefix . 'header_logo',
		)
	)
);

/**
 * Sticky logo
 */
$wp_customize->add_setting(
	$prefix . 'sticky_logo'
);

$wp_customize->add_control(
	new  WP_Customize_Media_Control(
		$wp_customize, $prefix . 'sticky_logo', array(
			'label'    => esc_html__( 'Sticky Logo', 'restaurant-wp' ),
			'section'  => 'title_tagline',
			'settings' => $prefix . 'sticky_logo',
		)
	)
);