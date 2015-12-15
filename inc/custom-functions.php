<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 07/12/2015
 * Time: 7:38 PM
 *
 * Custom functions
 *
 * @package Restaurant_WP
 */

/**
 * Widget
 */
require RESWP_THEME_DIR . 'inc/widgets/widgets.php';

/**
 * Rewrite uri stylesheet
 */
function restaurant_wp_rewrite_uri_stylesheet() {
	return get_stylesheet_directory_uri() . '/style.min.css?time=' . md5( time() );
}

add_action( 'stylesheet_uri', 'restaurant_wp_rewrite_uri_stylesheet' );

/**
 * Get Theme Option Data
 */
function restaurant_wp_get_theme_option_data() {
	$theme_options_data = get_theme_mods();

	return $theme_options_data;
}

/**
 * Add class to body class (CSS)
 *
 * @param $classes
 *
 * @return array
 */
function restaurant_wp_add_class_to_body( $classes ) {
	$classes[] = apply_filters( 'restaurant_wp_add_class_to_body', null );

	return $classes;
}

add_filter( 'body_class', 'restaurant_wp_add_class_to_body' );

/**
 * Logo
 */
function restaurant_wp_logo() {
	?>
	<a href="<?php echo get_home_url(); ?>" title="Restaurnt" rel="home" class="no-sticky-logo">
		<img src="http://demo.thimpress.com/resca/wp-content/uploads/2015/07/logo2.png" alt="Restaurant &amp; Coffee WordPress Theme – Resca" width="50" height="50">
	</a>
	<?php
}

add_action( 'restaurant_wp_logo', 'restaurant_wp_logo' );

/**
 * Sticky logo
 */
function restaurant_wp_sticky_logo() {
	?>
	<a href="<?php echo get_home_url(); ?>" title="Restaura Wor" rel="home" class="sticky-logo">
		<img src="http://demo.thimpress.com/resca/wp-content/uploads/2015/07/logo2.png" alt="Restaurant &amp; Coffee WordPress Theme – Resca" width="50" height="50">
	</a>
	<?php
}

add_action( 'restaurant_wp_sticky_logo', 'restaurant_wp_sticky_logo' );

/**
 * Post share
 */
function restaurant_wp_post_share() {
	echo '<ul class="social-share">';
	echo '<li><a target="_blank" class="facebook" href="https://www.facebook.com/sharer.php?s=100&amp;p[title]=' . get_the_title() . '&amp;p[url]=' . urlencode( get_permalink() ) . '&amp;p[images][0]=' . urlencode( wp_get_attachment_url( get_post_thumbnail_id() ) ) . '" title="' . __( 'Facebook', 'thim' ) . '"><i class="fa fa-facebook"></i></a></li>';
	echo '<li><a target="_blank" class="twitter" href="https://twitter.com/share?url=' . urlencode( get_permalink() ) . '&amp;text=' . esc_attr( get_the_title() ) . '" title="' . __( 'Twitter', 'thim' ) . '"><i class="fa fa-twitter"></i></a></li>';
	echo '<li><a target="_blank" class="googleplus" href="https://plus.google.com/share?url=' . urlencode( get_permalink() ) . '&amp;title=' . esc_attr( get_the_title() ) . '" title="' . __( 'Google Plus', 'thim' ) . '" onclick=\'window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;\'><i class="fa fa-google"></i></a></li>';
	echo '<li><a target="_blank" class="pinterest" href="http://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&amp;description=' . get_the_excerpt() . '&media=' . urlencode( wp_get_attachment_url( get_post_thumbnail_id() ) ) . '" onclick="window.open(this.href); return false;" title="' . __( 'Pinterest', 'thim' ) . '"><i class="fa fa-pinterest"></i></a></li>';
	echo '</ul>';
}

add_action( 'restaurant_wp_post_share', 'restaurant_wp_post_share' );

/**
 * Entry top
 *
 * @param string $size Size image thumbnail.
 */
function restaurant_wp_entry_top( $size ) {
	if ( has_post_thumbnail() ) {
		echo '<a href="' . esc_url( get_the_permalink() ) . '" title="' . esc_attr( get_the_title() ) . '">' . get_the_post_thumbnail( get_the_ID(), $size ) . '</a>';
	}
}

add_action( 'restaurant_wp_entry_top', 'restaurant_wp_entry_top' );

/**
 * Enqueue web font
 */
function restaurant_wp_enqueue_web_font() {
	wp_enqueue_style( 'Roboto-Google-Font', 'https://fonts.googleapis.com/css?family=Roboto:400,700,500,100,100italic,300,300italic,400italic,500italic,700italic,900,900italic' );
}

add_action( 'restaurant_wp_enqueue_scripts', 'restaurant_wp_enqueue_web_font' );
