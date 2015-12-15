<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 15/12/2015
 * Time: 6:25 PM
 *
 * Fonts
 *
 * @package Restaurant_WP
 */

$google_fonts = array();

$wp_customize->add_section(
	$prefix . 'typography_font',
	array(
		'title'    => esc_html__( 'Font', 'restaurant-wp' ),
		'priority' => 10,
		'panel'    => $prefix . 'typography',
	)
);

/**
 * Font body
 */
$wp_customize->add_setting(
	$prefix . 'font_body',
	array(
		'default' => 'Roboto',
	)
);

$google_fonts = restaurant_wp_get_list_google_fonts();

$wp_customize->add_control(
	$prefix . 'font_body',
	array(
		'label'    => esc_html__( 'Font body', 'restaurant-wp' ),
		'section'  => $prefix . 'typography_font',
		'settings' => $prefix . 'font_body',
		'type'     => 'select',
		'choices'  => $google_fonts,
	)
);