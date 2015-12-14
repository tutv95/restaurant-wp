<?php
/**
 * Created by PhpStorm.
 * User: never
 * Date: 12/11/2015
 * Time: 8:07 AM
 */

/**
 * @param $wp_customize
 */

function restaurant_wp_header_option( $wp_customize ) {
	$wp_customize->add_panel(
		'header', // panel id
		array(
			'title'    => esc_html__( 'Header', 'restaurant-wp' ),
			'priority' => 10,
		)
	);

	// Header layout
	$wp_customize->add_section(
		'header_layout',
		array(
			'title'       => esc_html__( 'Header layout', 'restaurant-wp' ),
			'description' => esc_html__( '', 'restaurant-wp' ),
			'priority'    => 10,
			'panel'       => 'header',
		)
	);
	$wp_customize->add_setting(
		'restaurant_wp_header_style',
		array(
			'default' => 'value2',
		)
	);
	$wp_customize->add_control(
		'header_display',
		array(
			'label'       => esc_html__( 'Header position', 'restaurant-wp' ),
			'description' => esc_html__( 'Overlay: Header will overlay other components below', 'restaurant-wp' ),
			'section'     => 'header_layout',
			'settings'    => 'restaurant_wp_header_style',
			'type'        => 'select',
			'choices'     => array(
				'value1' => 'Default',
				'value2' => 'Overlay',
			),
		)
	);
	$wp_customize->add_setting(
		'header_background_color',
		array(
			'default'           => '#fff',
			//'type'              => 'option',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'restaurant_wp_header_background_color', array(
				'label'       => esc_html__( 'Header background color', 'restaurant-wp' ),
				'description' => esc_html__( 'Pick a background color for header', 'restaurant-wp' ),
				'section'     => 'header_layout',
				'settings'    => 'header_background_color',
			)
		)
	);

	// Main menu
	$wp_customize->add_section(
		'main_menu',
		array(
			'title'    => esc_html__( 'Main menu', 'restaurant-wp' ),
			'priority' => 10,
			'panel'    => 'header',
		)
	);
	$wp_customize->add_setting(
		'main_menu_background_color',
		array(
			'default'           => '#fff',
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'main_menu_background_color', array(
				'label'       => esc_html__( 'Background color', 'restaurant-wp' ),
				'description' => esc_html__( 'Pick a background color for main menu', 'restaurant-wp' ),
				'section'     => 'main_menu',
				'settings'    => 'main_menu_background_color',
			)
		)
	);
	$wp_customize->add_setting(
		'main_menu_text_color',
		array(
			'default'           => '#fff',
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'main_menu_text_color', array(
				'label'       => esc_html__( 'Text color', 'restaurant-wp' ),
				'description' => esc_html__( 'Pick a text color for main menu', 'restaurant-wp' ),
				'section'     => 'main_menu',
				'settings'    => 'main_menu_text_color',
			)
		)
	);
	$wp_customize->add_setting(
		'main_menu_font_size',
		array(
			'default' => '14px'
		)
	);
	$wp_customize->add_control(
		'main_menu_font_size',
		array(
			'label'       => esc_html__( 'Font size', 'restaurant-wp' ),
			'description' => esc_html__( 'Default is 14px', 'restaurant-wp' ),
			'section'     => 'main_menu',
			'settings'    => 'main_menu_font_size',
			'type'        => 'select',
			'choices'     => array(
				'10px' => '10px',
				'11px' => '11px',
				'12px' => '12px',
				'13px' => '13px',
				'14px' => '14px',
				'15px' => '15px',
				'16px' => '16px',
				'17px' => '17px',
				'18px' => '18px',
				'19px' => '19px',
				'20px' => '20px',
				'21px' => '21px',
				'22px' => '22px',
				'23px' => '23px',
				'24px' => '24px',
				'25px' => '25px',
				'26px' => '26px',
				'27px' => '27px',
				'28px' => '28px',
				'29px' => '29px',
				'30px' => '30px',
				'31px' => '31px',
				'32px' => '32px',
				'33px' => '33px',
				'34px' => '34px',
				'35px' => '35px',
				'36px' => '36px',
				'37px' => '37px',
				'38px' => '38px',
				'39px' => '39px',
				'40px' => '40px',
				'41px' => '41px',
				'42px' => '42px',
				'43px' => '43px',
				'44px' => '44px',
				'45px' => '45px',
				'46px' => '46px',
				'47px' => '47px',
				'48px' => '48px',
				'49px' => '49px',
				'50px' => '50px',
			)
		)
	);
	$wp_customize->add_setting(
		'main_menu_font_weight',
		array(
			'default' => '400'
		)
	);
	$wp_customize->add_control(
		'main_menu_font_weight',
		array(
			'label'       => esc_html__( 'Font weight', 'restaurant-wp' ),
			'description' => esc_html__( 'Default is 400', 'restaurant-wp' ),
			'type'        => 'select',
			'choices'     => array(
				'bold'   => 'Bold',
				'normal' => 'Normal',
				'100'    => '100',
				'200'    => '200',
				'300'    => '300',
				'400'    => '400',
				'500'    => '500',
				'600'    => '600',
				'700'    => '700',
				'800'    => '800',
				'900'    => '900',
			),
			'settings'    => 'main_menu_font_weight',
			'section'     => 'main_menu',
		)
	);

	// Sub menu
	$wp_customize->add_section(
		'sub_menu',
		array(
			'title'    => esc_html__( 'Sub menu', 'restaurant-wp' ),
			'priority' => 10,
			'panel'    => 'header',
		)
	);
	$wp_customize->add_setting(
		'sub_menu_background_color',
		array(
			'type'    => 'option',
			'default' => '#fff',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'sub_menu_background_color', array(
				'label'       => esc_html__( 'Background color', 'restaurant-wp' ),
				'description' => esc_html__( 'Pick a background color for sub menu', 'restaurant-wp' ),
				'section'     => 'sub_menu',
				'settings'    => 'sub_menu_background_color',
			)
		)
	);
	$wp_customize->add_setting(
		'sub_menu_text_color',
		array(
			'type'    => 'option',
			'default' => '#fff',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'sub_menu_text_color', array(
				'label'       => esc_html__( 'Text color', 'restaurant-wp' ),
				'description' => esc_html__( 'Pick a text color for sub menu', 'restaurant-wp' ),
				'section'     => 'sub_menu',
				'settings'    => 'sub_menu_text_color',
			)
		)
	);
	$wp_customize->add_setting(
		'sub_menu_text_color_hover',
		array(
			'type'    => 'option',
			'default' => '#fff',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'sub_menu_text_color_hover', array(
				'label'       => esc_html__( 'Text color hover', 'restaurant-wp' ),
				'description' => esc_html__( 'Pick a text color hover for sub menu', 'restaurant-wp' ),
				'section'     => 'sub_menu',
				'settings'    => 'sub_menu_text_color_hover',
			)
		)
	);

	// Sticky menu
	$wp_customize->add_section(
		'sticky_menu',
		array(
			'title'    => 'Sticky menu',
			'priority' => 10,
			'panel'    => 'header',
		)
	);
	$wp_customize->add_setting(
		'restaurant_wp_sticky_menu',
		array(
			'default' => true
		)
	);
	$wp_customize->add_control(
		'restaurant_wp_sticky_menu',
		array(
			'label'       => esc_html__( 'Sticky menu on scroll', 'restaurant-wp' ),
			'description' => esc_html__( 'Check to enable a fixed header when scrolling, uncheck to disable.', 'restaurant-wp' ),
			'section'     => 'sticky_menu',
			'settings'    => 'restaurant_wp_sticky_menu',
			'type'        => 'checkbox',
		)
	);

	// Mobile menu
	$wp_customize->add_section(
		'mobile_menu',
		array(
			'title' => esc_html__( 'Mobile menu', 'restaurant-wp' ),
			'panel' => 'header',
		)
	);
	$wp_customize->add_setting(
		'mobile_menu_background_color',
		array(
			'type'    => 'option',
			'default' => '#fff',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'mobile_menu_background_color', array(
				'label'       => esc_html__( 'background color ', 'restaurant-wp' ),
				'description' => esc_html__( 'Pick a background color  for sub menu', 'restaurant-wp' ),
				'section'     => 'mobile_menu',
				'settings'    => 'mobile_menu_background_color',
			)
		)
	);
	$wp_customize->add_setting(
		'mobile_menu_text_color',
		array(
			'type'    => 'option',
			'default' => '#fff',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'mobile_menu_text_color', array(
				'label'       => esc_html__( 'Text color ', 'restaurant-wp' ),
				'description' => esc_html__( 'Pick a text color  for mobile menu', 'restaurant-wp' ),
				'section'     => 'mobile_menu',
				'settings'    => 'mobile_menu_text_color',
			)
		)
	);
	$wp_customize->add_setting(
		'mobile_menu_text_color_hover',
		array(
			'type'    => 'option',
			'default' => '#fff',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'mobile_menu_text_color_hover', array(
				'label'       => esc_html__( 'Text color hover', 'restaurant-wp' ),
				'description' => esc_html__( 'Pick a text color hover for mobile menu', 'restaurant-wp' ),
				'section'     => 'mobile_menu',
				'settings'    => 'mobile_menu_text_color_hover',
			)
		)
	);
}

add_action( 'customize_register', 'restaurant_wp_header_option' );

// get data customize
global $theme_options_data;
$theme_options_data = get_theme_mods();