<?php

/**
 * Widget Name: WPArena - Tabs Menu
 * Description: Widget for Tabs Menu
 * Author: WPArena
 * Author URI: wparena.com
 *
 * Class RESWP_Tabs_Menu_Widget
 *
 * @package Restaurant_WP
 */
class RESWP_Tabs_Menu_Widget extends SiteOrigin_Widget {
	function __construct() {
		$erm_menu_args  = array(
			'post_type'      => 'erm_menu',
			'posts_per_page' => - 1
		);
		$loop_menu_args = new WP_Query( $erm_menu_args );
		$cate[0]        = esc_html__( 'Create Menu', 'restaurant-wp' );
		if ( $loop_menu_args->have_posts() ) {
			$cate = '';
			while ( $loop_menu_args->have_posts() ) {
				$loop_menu_args->the_post();
				$cate[get_the_ID()] = get_the_title( get_the_ID() );
			}
		}
		wp_reset_postdata();

		$form_options = array(
			'tab'    => array(
				'type'      => 'repeater',
				'label'     => esc_html__( 'Tab', 'restauran-wp' ),
				'item_name' => esc_html__( 'Tab', 'restauran-wp' ),
				'fields'    => array(
					'title'        => array(
						'type'    => 'text',
						'label'   => esc_html__( 'Tab Title', 'restauran-wp' ),
						'default' => esc_html__( 'Tab title', 'restauran-wp' )
					),
					'title_option' => array(
						'type'   => 'section',
						'label'  => esc_html__( 'Title Options', 'restaurant-wp' ),
						'hide'   => true,
						'fields' => array(
							'sub_title' => array(
								'type'    => 'text',
								'label'   => esc_html__( 'Sub Title', 'restaurant-wp' ),
								'default' => esc_html__( '', 'restaurant_wp' )
							),
							'image'     => array(
								'type' => 'media',
								'name' => esc_html__( 'Upload Icon', 'restaurant-wp' )
							)
						)
					),
					'quick_menu'         => array(
						'type'   => 'select',
						'label'  => esc_html__( 'Select Menu', 'restaurant-wp' ),
						'options' => $cate
					),
					'columns'      => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Columns', 'restaurant-wp' ),
						'options' => array(
							'1' => 1,
							'2' => 2
						)
					)
				)
			),
			'menu_style' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Menu Style', 'restaurant-wp' ),
				'options'  => array(
					'regular' => esc_html__( 'Regular', 'restaurant-wp' ),
					'dotted' => esc_html__( 'Dotted', 'restaurant-wp' )
				),
				'default' => 'Regular'
			)
		);

		parent::__construct(
			'reswp_tabs_menu_widget',
			esc_html__( 'WPArena: Tab Menu', 'restaurant-wp' ),
			array(
				'description' => esc_html__( 'Widget for Tab Menu', 'restaurant-wp' )
			),
			array(),
			$form_options,
			plugin_dir_path( __FILE__ )
		);
	}

	function get_template_name( $instance ) {
		return 'tabs-menu-template';
	}

	function get_template_dir( $instance ) {
		return 'templates';
	}

	function get_style_name( $instance ) {
		return '';
	}
}

siteorigin_widget_register( 'reswp-tabs-menu-widget', __FILE__, 'RESWP_Tabs_Menu_Widget' );