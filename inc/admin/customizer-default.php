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
		$prefix . 'width_logo'          => 150,
		$prefix . 'display_back_to_top' => true,
		$prefix . 'display_preloader'   => true,
	);

	foreach ( $mods as $index => $mod ) {
		set_theme_mod( $index, $mod );
	}
}

add_action( 'after_switch_theme', 'restaurant_wp_init_default_theme_mods' );