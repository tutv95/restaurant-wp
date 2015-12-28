<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 15/12/2015
 * Time: 10:58 AM
 *
 * Header: Main menu
 *
 * @package Restaurant_WP
 */

$prefix = 'restaurant_wp_';

$wp_customize->add_section( $prefix . 'main_menu', array(
	'title'    => esc_html__( 'Main menu', 'restaurant-wp' ),
	'priority' => 10,
	'panel'    => $prefix . 'panel_header',
) );

$wp_customize->add_setting( $prefix . 'main_menu_background_color', array(
	'default'           => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . 'main_menu_background_color', array(
	'label'       => esc_html__( 'Background color', 'restaurant-wp' ),
	'description' => esc_html__( 'Pick a background color for main menu', 'restaurant-wp' ),
	'section'     => $prefix . 'main_menu',
	'settings'    => $prefix . 'main_menu_background_color',
) ) );

$wp_customize->add_setting( $prefix . 'main_menu_text_color', array(
	'default'           => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . 'main_menu_text_color', array(
	'label'       => esc_html__( 'Text color', 'restaurant-wp' ),
	'description' => esc_html__( 'Pick a text color for main menu', 'restaurant-wp' ),
	'section'     => $prefix . 'main_menu',
	'settings'    => $prefix . 'main_menu_text_color',
) ) );

$wp_customize->add_setting( $prefix . 'main_menu_font_size', array(
	'default'           => '14px',
	'sanitize_callback' => 'restaurant_wp_callback',
) );

$wp_customize->add_control( $prefix . 'main_menu_font_size', array(
	'label'       => esc_html__( 'Font size', 'restaurant-wp' ),
	'description' => esc_html__( 'Default is 14px', 'restaurant-wp' ),
	'section'     => $prefix . 'main_menu',
	'settings'    => $prefix . 'main_menu_font_size',
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
) );

$wp_customize->add_setting( $prefix . 'main_menu_font_weight', array(
	'default'           => '400',
	'sanitize_callback' => 'restaurant_wp_callback',
) );

$wp_customize->add_control( $prefix . 'main_menu_font_weight', array(
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
	'settings'    => $prefix . 'main_menu_font_weight',
	'section'     => $prefix . 'main_menu',
) );