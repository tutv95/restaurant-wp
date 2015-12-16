<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 16/12/2015
 * Time: 8:34 PM
 *
 * Sharing
 *
 * @package Restaurant_WP
 */

$wp_customize->add_section(
	$prefix . 'display_sharing',
	array(
		'title'       => esc_html__( 'Sharing', 'restaurant-wp' ),
		'description' => esc_html__( '', 'restaurant-wp' ),
		'priority'    => 10,
		'panel'       => $prefix . 'panel_display',
	)
);

/**
 * Facebook
 */
$wp_customize->add_setting(
	$prefix . 'sharing_facebook',
	array(
		'default' => true,
	)
);

$wp_customize->add_control(
	$prefix . 'sharing_facebook',
	array(
		'label'       => esc_html__( 'Facebook', 'restaurant-wp' ),
		'description' => esc_html__( '', 'restaurant-wp' ),
		'section'     => $prefix . 'display_sharing',
		'settings'    => $prefix . 'sharing_facebook',
		'type'        => 'checkbox',
	)
);

/**
 * Google +
 */
$wp_customize->add_setting(
	$prefix . 'sharing_google',
	array(
		'default' => true,
	)
);

$wp_customize->add_control(
	$prefix . 'sharing_google',
	array(
		'label'       => esc_html__( 'Google Plus', 'restaurant-wp' ),
		'description' => esc_html__( '', 'restaurant-wp' ),
		'section'     => $prefix . 'display_sharing',
		'settings'    => $prefix . 'sharing_google',
		'type'        => 'checkbox',
	)
);

/**
 * Twitter
 */
$wp_customize->add_setting(
	$prefix . 'sharing_twitter',
	array(
		'default' => true,
	)
);

$wp_customize->add_control(
	$prefix . 'sharing_twitter',
	array(
		'label'       => esc_html__( 'Twitter', 'restaurant-wp' ),
		'description' => esc_html__( '', 'restaurant-wp' ),
		'section'     => $prefix . 'display_sharing',
		'settings'    => $prefix . 'sharing_twitter',
		'type'        => 'checkbox',
	)
);


/**
 * Pinterest
 */
$wp_customize->add_setting(
	$prefix . 'sharing_pinterest',
	array(
		'default' => true,
	)
);

$wp_customize->add_control(
	$prefix . 'sharing_pinterest',
	array(
		'label'       => esc_html__( 'Pinterest', 'restaurant-wp' ),
		'description' => esc_html__( '', 'restaurant-wp' ),
		'section'     => $prefix . 'display_sharing',
		'settings'    => $prefix . 'sharing_pinterest',
		'type'        => 'checkbox',
	)
);

