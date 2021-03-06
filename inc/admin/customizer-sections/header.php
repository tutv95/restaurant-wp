<?php
/**
 * Created by PhpStorm.
 * User: never
 * Date: 12/11/2015
 * Time: 8:07 AM
 *
 * Panel Header
 *
 * @package Restaurant_WP
 */

/**
 * @param $wp_customize
 */

$prefix = 'restaurant_wp_';

$wp_customize->add_panel( $prefix . 'panel_header', array(
	'title'    => esc_html__( 'Header', 'restaurant-wp' ),
	'priority' => 21,
) );

require_once RESWP_THEME_DIR . 'inc/admin/customizer-sections/header-layout.php';
require_once RESWP_THEME_DIR . 'inc/admin/customizer-sections/header-sticky-menu.php';