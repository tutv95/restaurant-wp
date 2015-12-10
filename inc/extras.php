<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Restaurant_WP
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function restaurant_wp_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}

add_filter( 'body_class', 'restaurant_wp_body_classes' );

/**
 * Primary menu
 */
function restaurant_wp_primary_menu() {
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'menu_id'        => 'primary-menu',
			'menu_class'     => 'navbar',
			'container'      => false,
		)
	);
}

/**
 * Mobile menu
 */
function restaurant_wp_mobile_menu() {
	if ( ! has_nav_menu( 'mobile' ) && has_nav_menu( 'primary' ) ) {
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu_id'        => 'mobile-menu',
				'menu_class'     => 'navbar',
				'container'      => false,
			)
		);

		return;
	}

	wp_nav_menu(
		array(
			'theme_location' => 'mobile',
			'menu_id'        => 'mobile-menu',
			'menu_class'     => 'navbar',
			'container'      => false,
		)
	);
}