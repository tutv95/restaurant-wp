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
		add_action( 'customize_save_after', array( $this, 'save_customize' ) );
	}

	/**
	 * Deregister customize default unnecessary
	 *
	 * @param $wp_customize
	 */
	public function deregister( $wp_customize ) {
		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'background_image' );
		$wp_customize->remove_section( 'header_image' );
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

	/**
	 *
	 * Compile SASS to CSS
	 */
	public function compile_scss2css() {
		$scss = new scssc();
		$scss->setImportPaths( RESWP_THEME_DIR . "assets/sass/" );
		$scss->setFormatter( "scss_formatter_compressed" );

		$css           = $scss->compile( '@import "style.scss"' );
		$style_css_dir = RESWP_THEME_DIR . 'style.min.css';

		$this->file_put_contents__( $style_css_dir, $css );
	}

	/**
	 * Save customize to sass
	 */
	public function save_config() {
		$theme_option_data = restaurant_wp_get_theme_option_data();

		$key_save_config = array(
			'restaurant_wp_header_background_color',
			'restaurant_wp_main_menu_background_color',
			'restaurant_wp_main_menu_text_color',
			'restaurant_wp_main_menu_font_size',
			'restaurant_wp_main_menu_font_weight',
			'restaurant_wp_sub_menu_background_color',
			'restaurant_wp_sub_menu_text_color',
			'restaurant_wp_sub_menu_text_color_hover',
			'restaurant_wp_mobile_menu_background_color',
			'restaurant_wp_mobile_menu_text_color',
			'restaurant_wp_mobile_menu_text_color_hover',
		);

		$content_sass = '';
		foreach ( $key_save_config as $index => $key ) {
			$content_sass .= '$' . $key . ': ' . $theme_option_data[$key] . ';' . PHP_EOL;
		}

		$config_dir = RESWP_THEME_DIR . 'assets/sass/_config.scss';
		$this->file_put_contents__( $config_dir, $content_sass );
	}

	public function save_customize() {
		$this->save_config();
		$this->compile_scss2css();
	}

	function file_put_contents__( $file, $data ) {
		include_once( ABSPATH . 'wp-admin/includes/file.php' );
		WP_Filesystem();
		global $wp_filesystem;

		return $wp_filesystem->put_contents( $file, $data, FS_CHMOD_FILE );
	}

	function file_get_contents( $file ) {
		include_once( ABSPATH . 'wp-admin/includes/file.php' );
		WP_Filesystem();
		global $wp_filesystem;

		return $wp_filesystem->get_contents( $file );
	}
}

$restaurant_wp_customize = new Restaurant_WP_Customize__();