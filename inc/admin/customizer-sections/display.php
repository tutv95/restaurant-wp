<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 16/12/2015
 * Time: 9:12 PM
 *
 * Display
 *
 * @package Restaurant_WP
 */

/**
 * @param $wp_customize
 */

$prefix = 'restaurant_wp_';

$wp_customize->add_panel(
	$prefix . 'panel_display',
	array(
		'title'    => esc_html__( 'Display', 'restaurant-wp' ),
		'priority' => 50,
	)
);

require_once RESWP_THEME_DIR . 'inc/admin/customizer-sections/display-sharing.php';
require_once RESWP_THEME_DIR . 'inc/admin/customizer-sections/display-extension.php';