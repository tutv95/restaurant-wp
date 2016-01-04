<?php

/**
 * Widget Name: WPArena - Heading
 * Description: Heading
 * Author: WPArena
 * Author URI: wparena.com
 *
 * Class RESWP_Heading_Widget
 *
 * @package Restaurant_WP
 */
class RESWP_Heading_Widget extends SiteOrigin_Widget {
	function __construct() {
		$form_options = array(
			'sub_title' => array(
				'type'    => 'text',
				'label'   => esc_html__( 'Sub Heading', 'restaurant-wp' ),
				'default' => '',
			),

			'title' => array(
				'type'    => 'text',
				'label'   => esc_html__( 'Heading title', 'restaurant-wp' ),
				'default' => ''
			),

			'heading_size' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Sub Heading', 'restaurant-wp' ),
				'options' => array(
					'h2' => __( 'h2', 'restaurant-wp' ),
					'h3' => __( 'h3', 'restaurant-wp' ),
					'h4' => __( 'h4', 'restaurant-wp' ),
					'h5' => __( 'h5', 'restaurant-wp' ),
					'h6' => __( 'h6', 'restaurant-wp' )
				),
				'default' => 'h3'
			),
		);

		parent::__construct(
			'reswp_heading_widget',
			esc_html__( 'WPArena: Heading', 'restaurant-wp' ),
			array(
				'description' => esc_html__( 'Heading', 'restaurant-wp' ),
			),
			array(),
			$form_options,
			plugin_dir_path( __FILE__ )
		);
	}

	function get_template_name( $instance ) {
		return 'heading-template';
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
	}
}

siteorigin_widget_register( 'reswp_heading_widget', __FILE__, 'RESWP_Heading_Widget' );