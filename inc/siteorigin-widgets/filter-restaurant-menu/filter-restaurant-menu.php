<?php

/**
 * Widget Name: WPArena - Filter Restaurant Menu
 * Description: Widget Filter for Restaurant Menu
 * Author: WPArena
 * Author URI: wparena.com
 *
 * Class RESWP_Restaurant_Filter_Menu_Widget
 *
 * @package Restaurant_WP
 */
class RESWP_Restaurant_Filter_Menu_Widget extends SiteOrigin_Widget {
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
			'tab'        => array(
				'type'      => 'repeater',
				'label'     => esc_html__( 'Tab', 'restauran-wp' ),
				'item_name' => esc_html__( 'Tab', 'restauran-wp' ),
				'fields'    => array(
					'title'      => array(
						'type'  => 'text',
						'label' => esc_html__( 'Tab Title', 'restauran-wp' ),
					),
					'sub_title'  => array(
						'type'  => 'text',
						'label' => esc_html__( 'Sub Title', 'restaurant-wp' ),
					),
					'image'      => array(
						'type'  => 'media',
						'label' => esc_html__( 'Icon Image', 'restaurant-wp' ),
						'name'  => esc_html__( 'Upload Icon', 'restaurant-wp' )
					),
					'quick_menu' => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Select Menu', 'restaurant-wp' ),
						'options' => $cate
					),
				)
			),
			'columns'    => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Columns', 'restaurant-wp' ),
				'options' => array(
					'1' => 1,
					'2' => 2
				)
			),
			'menu_style' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Menu Style', 'restaurant-wp' ),
				'options' => array(
					'regular' => esc_html__( 'Regular', 'restaurant-wp' ),
					'dotted'  => esc_html__( 'Dotted', 'restaurant-wp' )
				),
				'default' => 'Regular'
			)
		);

		parent::__construct(
			'reswp_restaurant_filter_menu_widget',
			esc_html__( 'WPArena: Filter Restaurant Menu', 'restaurant-wp' ),
			array(
				'description' => esc_html__( 'Widget for Filter Menu', 'restaurant-wp' )
			),
			array(),
			$form_options,
			plugin_dir_path( __FILE__ )
		);
	}


	function get_template_name( $instance ) {
		return 'filter-restaurant-menu-template';
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
		wp_enqueue_script( 'magnific-popup', RESWP_THEME_URL . 'inc/siteorigin-widgets/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'erm-front', RESWP_THEME_URL . 'inc/siteorigin-widgets/assets/js/erm-front-scripts.js', array( 'jquery' ), '', true );

		wp_enqueue_script( 'jquery-mixitup', RESWP_THEME_URL . 'inc/siteorigin-widgets/filter-restaurant-menu/js/jquery.mixitup.min.js', array( 'jquery' ), '2.1.11', true );
		wp_enqueue_script( 'restaurant_wp_mixitup', RESWP_THEME_URL . 'inc/siteorigin-widgets/filter-restaurant-menu/js/restaurant_wp_mixitup.js', array( 'jquery-mixitup' ), RESWP_THEME_VERSION, true );
	}
}

siteorigin_widget_register( 'reswp_restaurant_filter_menu_widget', __FILE__, 'RESWP_Restaurant_Filter_Menu_Widget' );