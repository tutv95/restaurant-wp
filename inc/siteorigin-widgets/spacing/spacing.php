<?php

/**
 * Widget Name: WPArena - Spacing
 * Description: Widget Spacing
 * Author: WPArena
 * Author URI: wparena.com
 *
 * Class RESWP_Spacing_Widget
 *
 * @package Restaurant_WP
 */
class RESWP_Spacing_Widget extends SiteOrigin_Widget {
	function __construct() {
		$form_options = array(
			'height' => array(
				'label' => esc_html__( 'Height', 'restaurant-wp' ),
				'type'  => 'number',
				'default'=>'30',
				'desc'  => __( "Enter empty space height.", "restaurant-wp" ),
				'suffix'     => 'px',
			)
		);

		parent::__construct(
				'reswp_spacing_widget',
				esc_html__( 'WPArena: Spacing widget', 'restaurant-wp'),
				array(
						'description' => esc_html__( 'Widget for Spacing', 'restaurant-wp' )
				),
				array(),
				$form_options,
				plugin_dir_path( __FILE__ )
		);
	}

	function get_template_name( $instance ) {
		return 'spacing';
	}

	function get_template_dir( $instance ) {
		return 'templates';
	}

	function get_style_name( $instance ) {
		return '';
	}

	function enqueue_frontend_scripts( $instance ) {
		parent::enqueue_frontend_scripts( $instance );
		wp_enqueue_style( 'magnific-popup', RESWP_THEME_URL . 'inc/siteorigin-widgets/assets/css/magnific-popup.css' );
		wp_enqueue_script( 'magnific-popup', RESWP_THEME_URL . 'inc/siteorigin-widgets/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'erm-front', RESWP_THEME_URL . 'inc/siteorigin-widgets/assets/js/erm-front-scripts.js', array( 'jquery' ), '', true );
	}
}

siteorigin_widget_register( 'reswp_spacing_widget', __FILE__, 'RESWP_Spacing_Widget' );