<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php if ( get_header_image() ) : ?>
 * <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
 * <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
 * </a>
 * <?php endif; // End header image check. ?>
 *
 * @link    https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Restaurant_WP
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses restaurant_wp_header_style()
 */
function restaurant_wp_custom_header_setup() {
	add_theme_support(
		'custom-header', apply_filters(
			'restaurant_wp_custom_header_args', array(
				'default-image'      => '',
				'default-text-color' => '000000',
				'width'              => 1400,
				'height'             => 400,
				'flex-height'        => true,
			)
		)
	);
}

add_action( 'after_setup_theme', 'restaurant_wp_custom_header_setup' );
