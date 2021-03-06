<?php

/**
 * Widget Name: WPArena - Restaurant Menu
 * Description: Widget for Restaurant Menu
 * Author: WPArena
 * Author URI: wparena.com
 *
 * Class RESWP_Restaurant_Menu_Widget
 *
 * @package Restaurant_WP
 */
class RESWP_Restaurant_Menu_Widget extends SiteOrigin_Widget {
	function __construct() {
		$erm_menu_args = array(
			'post_type'      => 'erm_menu',
			'posts_per_page' => - 1,
		);
		$lop_menu_args = new WP_Query( $erm_menu_args );
		$cate[0]       = esc_html__( 'Create Menu', 'restaurant-wp' );
		if ( $lop_menu_args->have_posts() ) {
			$cate = '';
			while ( $lop_menu_args->have_posts() ) {
				$lop_menu_args->the_post();
				$cate[get_the_ID()] = get_the_title( get_the_ID() );;
			};
		}
		wp_reset_postdata();

		$form_options = array(
			'header_type'       => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Type', 'restaurant-wp' ),
				'default' => 'h3',
				'options' => array(
					'h2' => esc_html__( 'h2', 'restaurant-wp' ),
					'h3' => esc_html__( 'h3', 'restaurant-wp' ),
					'h4' => esc_html__( 'h4', 'restaurant-wp' ),
					'h5' => esc_html__( 'h5', 'restaurant-wp' ),
					'h6' => esc_html__( 'h6', 'restaurant-wp' ),
				)
			),
			'header_color'      => array(
				'type'    => 'color',
				'label'   => esc_html__( 'Choose a color', 'restaurant-wp' ),
				'default' => '#fff'
			),
			'header_background' => array(
				'type'     => 'media',
				'label'    => esc_html__( 'Background image for header', 'restaurant-wp' ),
				'choose'   => esc_html__( 'Choose image', 'restaurant-wp' ),
				'update'   => esc_html__( 'Set image', 'restaurant-wp' ),
				'library'  => 'image',
				'fallback' => false,
			),
			'quick_menu'        => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Choose a menu.', 'restaurant-wp' ),
				'default' => 0,
				'options' => $cate
			),
			'columns'           => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Columns', 'restaurant-wp' ),
				'default' => 1,
				'options' => array(
					'1' => 1,
					'2' => 2,
				)
			),
			'menu_style'        => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Menu style', 'restaurant-wp' ),
				'default' => 'regular',
				'options' => array(
					'regular' => esc_html__( 'Regular', 'restaurant-wp' ),
					'dotted'  => esc_html__( 'Dotted', 'restaurant-wp' ),
				)
			),
		);

		parent::__construct(
			'reswp_restaurant_menu_widget',
			esc_html__( 'WPArena: Restaurant Menu', 'restaurant-wp' ),
			array(
				'description' => esc_html__( 'Widget for Quick Restaurant Menu', 'restaurant-wp' ),
			),
			array(),
			$form_options,
			plugin_dir_path( __FILE__ )
		);
	}

	function get_template_name( $instance ) {
		return 'restaurant-menu';
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

siteorigin_widget_register( 'reswp_restaurant_menu_widget', __FILE__, 'RESWP_Restaurant_Menu_Widget' );