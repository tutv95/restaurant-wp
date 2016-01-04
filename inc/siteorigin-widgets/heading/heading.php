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
				'label'   => esc_html__( 'Size Heading', 'restaurant-wp' ),
				'options' => array(
					'h2' => __( 'h2', 'restaurant-wp' ),
					'h3' => __( 'h3', 'restaurant-wp' ),
					'h4' => __( 'h4', 'restaurant-wp' ),
					'h5' => __( 'h5', 'restaurant-wp' ),
					'h6' => __( 'h6', 'restaurant-wp' )
				),
				'default' => 'h3'
			),

			'custom_font_heading' => array(
				'type'          => 'section',
				'label'         => __( 'Custom Font Heading', 'restaurant-wp' ),
				'hide'          => true,
				'state_handler' => array(
					'font_heading_type[custom]'  => array( 'show' ),
					'font_heading_type[default]' => array( 'hide' ),
				),
				'fields'        => array(
					'custom_text_color'  => array(
						'type'    => 'color',
						'label'   => __( 'Text Heading color', 'restaurant-wp' ),
						'default' => '#333',
					),
					'custom_font_size'   => array(
						'type'        => 'number',
						'label'       => __( 'Font Size', 'restaurant-wp' ),
						'suffix'      => 'px',
						'default'     => 50,
						'description' => __( 'custom font size', 'restaurant-wp' ),
						'class'       => 'color-mini',
					),
					'custom_font_weight' => array(
						'type'        => 'select',
						'label'       => __( 'Custom Font Weight', 'restaurant-wp' ),
						'options'     => array(
							'normal' => __( 'Normal', 'restaurant-wp' ),
							'bold'   => __( 'Bold', 'restaurant-wp' ),
							'100'    => __( '100', 'restaurant-wp' ),
							'200'    => __( '200', 'restaurant-wp' ),
							'300'    => __( '300', 'restaurant-wp' ),
							'400'    => __( '400', 'restaurant-wp' ),
							'500'    => __( '500', 'restaurant-wp' ),
							'600'    => __( '600', 'restaurant-wp' ),
							'700'    => __( '700', 'restaurant-wp' ),
							'800'    => __( '800', 'restaurant-wp' ),
							'900'    => __( '900', 'restaurant-wp' )
						),
						'description' => __( 'Select Custom Font Weight', 'restaurant-wp' ),
						'class'       => 'color-mini',
					),
					'custom_font_style'  => array(
						'type'        => 'select',
						'label'       => __( 'Custom Font Style', 'restaurant-wp' ),
						'options'     => array(
							'inherit' => __( 'inherit', 'restaurant-wp' ),
							'initial' => __( 'initial', 'restaurant-wp' ),
							'italic'  => __( 'italic', 'restaurant-wp' ),
							'normal'  => __( 'normal', 'restaurant-wp' ),
							'oblique' => __( 'oblique', 'restaurant-wp' )
						),
						'description' => __( 'Select Custom Font Style', 'restaurant-wp' ),
						'class'       => 'color-mini',
					),
				),
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