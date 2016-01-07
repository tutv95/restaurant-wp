<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 07/1/2016
 * Time: 10:36 AM
 */

function restaurant_wp_init_default_theme_mods() {
	$prefix = 'restaurant_wp_';
	$mods   = array(
		'width_logo'              => 150,
		'display_back_to_top'     => true,
		'display_preloader'       => true,
		'theme_layout'            => 'right',
		'sharing_facebook'        => true,
		'sharing_google'          => true,
		'sharing_twitter'         => true,
		'sharing_pinterest'       => true,
		'header_style'            => 'default',
		'header_background_color' => '#666',
		'sticky_menu'             => true,
		'primary_color'           => '#f27935',
		'font_body'               => 'Roboto',
	);

	foreach ( $mods as $index => $mod ) {
		set_theme_mod( $prefix . $index, $mod );
	}
}

add_action( 'after_switch_theme', 'restaurant_wp_init_default_theme_mods' );