<?php

/**
 * Widget Name: WPArena - Opentable Form
 * Description: Support Opentable Form.
 * Author: WPArena
 * Author URI: wparena.com
 *
 * Class RESWP_Opentable_Form_Widget
 *
 * @package Restaurant_WP
 */
class RESWP_Opentable_Form_Widget extends SiteOrigin_Widget {
	function __construct() {
		$form_options = array(
			'sub_title' => array(
				'type'    => 'text',
				'label'   => esc_html__( 'SubTitle', 'restaurant-wp' ),
				'default' => '',
			),

			'title' => array(
				'type'    => 'text',
				'label'   => esc_html__( 'Title', 'restaurant-wp' ),
				'default' => ''
			),

			'description' => array(
				'type'    => 'textarea',
				'label'   => esc_html__( 'Description', 'restaurant-wp' ),
				'default' => ''
			),

			'resID' => array(
				'type'    => 'text',
				'label'   => esc_html__( 'OpenTable Restaurant ID', 'restaurant-wp' ),
				'default' => '136147'
			),

			'country' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Country.', 'restaurant-wp' ),
				'default' => '',
				'options' => array(
					'com'    => 'Global / U.S.',
					'de'     => 'Germany',
					'co.uk'  => 'United Kingdom',
					'jp'     => 'Japan',
					'com.mx' => 'Mexico'
				)
			),
		);

		parent::__construct(
			'reswp_opentable_form_widget',
			esc_html__( 'WPArena: Open Table Form', 'restaurant-wp' ),
			array(
				'description' => esc_html__( 'Widget support Opentable Form', 'restaurant-wp' ),
			),
			array(),
			$form_options,
			plugin_dir_path( __FILE__ )
		);
	}

	function get_template_name( $instance ) {
		return 'open-table-template';
	}

	function get_template_dir( $instance ) {
		return 'templates';
	}

	function get_style_name( $instance ) {
		return '';
	}

	function enqueue_frontend_scripts( $instance ) {
		parent::enqueue_frontend_scripts( $instance );
		wp_enqueue_style( 'Google-MrDeHaviland-Font', '//fonts.googleapis.com/css?family=Mr+De+Haviland' );
		wp_enqueue_script( 'ResWP-Moment', RESWP_THEME_URL . 'inc/siteorigin-widgets/open-table/js/moment.js', array( 'jquery' ), '2.10.6', true );
		wp_enqueue_script( 'ResWP-Pikaday', RESWP_THEME_URL . 'inc/siteorigin-widgets/open-table/js/pikaday.js', array( 'ResWP-Moment' ), '1.4.0', true );
	}
}

siteorigin_widget_register( 'reswp_opentable_form_widget', __FILE__, 'RESWP_Opentable_Form_Widget' );