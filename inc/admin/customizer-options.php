<?php

/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 15/12/2015
 * Time: 9:12 AM
 *
 * Create Restaurant_WP_Customize__
 *
 * @package Restaurant_WP
 */


/**
 * Class Restaurant_WP_Customize__
 */
class Restaurant_WP_Customize__ {
	/**
	 * Restaurant_WP_Customize__ constructor.
	 */
	public function __construct() {
		add_action( 'customize_register', [ $this, 'deregister' ] );
		add_action( 'customize_register', [ $this, 'create_customize' ] );
	}

	/**
	 * Deregister customize default unnecessary
	 *
	 * @param $wp_customize
	 */
	public function deregister( $wp_customize ) {
		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'background_image' );
	}

	/**
	 * Create customize
	 *
	 * @param $wp_customize
	 */
	public function create_customize( $wp_customize ) {
		// Header
		require_once RESWP_THEME_DIR . 'inc/admin/customizer-sections/header.php';
		require_once RESWP_THEME_DIR . 'inc/admin/customizer-sections/logo.php';
	}
}

$restaurant_wp_customize = new Restaurant_WP_Customize__();