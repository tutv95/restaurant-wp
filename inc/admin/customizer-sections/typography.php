<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 15/12/2015
 * Time: 6:22 PM
 *
 * Typography
 *
 * @package Restaurant_WP
 */

$prefix = 'restaurant_wp_';

$wp_customize->add_panel( $prefix . 'typography', array(
	'title'    => esc_html__( 'Typography', 'restaurant-wp' ),
	'priority' => 40,
) );

require_once RESWP_THEME_DIR . 'inc/admin/customizer-sections/typography-font.php';
require_once RESWP_THEME_DIR . 'inc/admin/customizer-sections/typography-color.php';