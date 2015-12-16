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
 * Google fonts
 */
require RESWP_THEME_DIR . 'inc/google-fonts.php';

/**
 * Rewrite uri stylesheet
 */
function restaurant_wp_rewrite_uri_stylesheet() {
	return get_stylesheet_directory_uri() . '/style.v1.min.css?time=' . md5( time() );
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
	$theme_option_data = restaurant_wp_get_theme_option_data();

	// Header style
	if ( isset( $theme_option_data['restaurant_wp_header_style'] ) && $theme_option_data['restaurant_wp_header_style'] == 'overlay' ) {
		$classes[] = 'header_overlay';
	} else {
		$classes[] = 'header_default';
	}

	// Sticky menu
	if ( isset( $theme_option_data['restaurant_wp_sticky_menu'] ) && $theme_option_data['restaurant_wp_sticky_menu'] ) {
		$classes[] = 'sticky_menu';
	} else {
		$classes[] = 'no_sticky_menu';
	}

	return $classes;
}

add_filter( 'body_class', 'restaurant_wp_add_class_to_body' );


/**
 * Logo
 */
function restaurant_wp_logo() {
	$option_data = restaurant_wp_get_theme_option_data();
	if ( isset( $option_data['restaurant_wp_header_logo'] ) && is_numeric( $option_data['restaurant_wp_header_logo'] ) ) {
		$id_image = $option_data['restaurant_wp_header_logo'];
		?>
		<a href="<?php echo get_home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" rel="home" class="no-sticky-logo">
			<?php echo wp_get_attachment_image( $id_image, 'full' ); ?>
		</a>
		<?php
	} else {
		?>
		<a href="<?php echo get_home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" rel="home" class="no-sticky-logo">
			<img src="<?php echo esc_url( RESWP_THEME_URL . 'assets/images/logo.png' ) ?>" />
		</a>
		<?php
	}
}

add_action( 'restaurant_wp_logo', 'restaurant_wp_logo' );

/**
 * Sticky logo
 */
function restaurant_wp_sticky_logo() {
	$option_data = restaurant_wp_get_theme_option_data();

	if ( isset( $option_data['restaurant_wp_sticky_logo'] ) && is_numeric( $option_data['restaurant_wp_sticky_logo'] ) ) {
		$id_image = $option_data['restaurant_wp_sticky_logo'];
		?>
		<a href="<?php echo get_home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" rel="home" class="sticky-logo">
			<?php echo wp_get_attachment_image( $id_image, 'full' ); ?>
		</a>
		<?php
	} else {
		$option_data = restaurant_wp_get_theme_option_data();
		if ( isset( $option_data['restaurant_wp_header_logo'] ) && is_numeric( $option_data['restaurant_wp_header_logo'] ) ) {
			$id_image = $option_data['restaurant_wp_header_logo'];
			?>
			<a href="<?php echo get_home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" rel="home" class="sticky-logo">
				<?php echo wp_get_attachment_image( $id_image, 'full' ); ?>
			</a>
			<?php
		} else {
			?>
			<a href="<?php echo get_home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" rel="home" class="sticky-logo">
				<img src="<?php echo esc_url( RESWP_THEME_URL . 'assets/images/logo.png' ) ?>" />
			</a>
			<?php
		}
	}
}

add_action( 'restaurant_wp_sticky_logo', 'restaurant_wp_sticky_logo' );

/**
 * Post share
 */
function restaurant_wp_post_share() {
	$theme_option_data = restaurant_wp_get_theme_option_data();

	$list_share = '';

	if ( isset( $theme_option_data['restaurant_wp_sharing_facebook'] ) && $theme_option_data['restaurant_wp_sharing_facebook'] ) {
		$list_share .= '<li><a target="_blank" class="facebook" href="https://www.facebook.com/sharer.php?s=100&amp;p[title]=' . get_the_title() . '&amp;p[url]=' . urlencode( get_permalink() ) . '&amp;p[images][0]=' . urlencode( wp_get_attachment_url( get_post_thumbnail_id() ) ) . '" title="' . __( 'Facebook', 'restaurant-wp' ) . '"><i class="fa fa-facebook"></i></a></li>';
	}

	if ( isset( $theme_option_data['restaurant_wp_sharing_twitter'] ) && $theme_option_data['restaurant_wp_sharing_twitter'] ) {
		$list_share .= '<li><a target="_blank" class="twitter" href="https://twitter.com/share?url=' . urlencode( get_permalink() ) . '&amp;text=' . esc_attr( get_the_title() ) . '" title="' . __( 'Twitter', 'restaurant-wp' ) . '"><i class="fa fa-twitter"></i></a></li>';
	}

	if ( isset( $theme_option_data['restaurant_wp_sharing_google'] ) && $theme_option_data['restaurant_wp_sharing_google'] ) {
		$list_share .= '<li><a target="_blank" class="googleplus" href="https://plus.google.com/share?url=' . urlencode( get_permalink() ) . '&amp;title=' . esc_attr( get_the_title() ) . '" title="' . __( 'Google Plus', 'thim' ) . '" onclick=\'window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;\'><i class="fa fa-google"></i></a></li>';
	}

	if ( isset( $theme_option_data['restaurant_wp_sharing_pinterest'] ) && $theme_option_data['restaurant_wp_sharing_pinterest'] ) {
		$list_share .= '<li><a target="_blank" class="pinterest" href="http://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&amp;description=' . get_the_excerpt() . '&media=' . urlencode( wp_get_attachment_url( get_post_thumbnail_id() ) ) . '" onclick="window.open(this.href); return false;" title="' . __( 'Pinterest', 'restaurant-wp' ) . '"><i class="fa fa-pinterest"></i></a></li>';
	}

	if ( $list_share != '' ) {
		echo '<ul class="social-share">';
		echo $list_share;
		echo '</ul>';
	}
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

function restaurant_wp_google_font_body() {
	$theme_option_data = restaurant_wp_get_theme_option_data();

	if ( isset( $theme_option_data['restaurant_wp_font_body'] ) ) {
		$key_font     = intval( $theme_option_data['restaurant_wp_font_body'] );
		$google_fonts = restaurant_wp_get_list_google_fonts();

		$font = $google_fonts[$key_font];
		wp_enqueue_style( 'restaurant_wp_google_font_' . strtolower( str_replace( ' ', '_', $font ) ), '//fonts.googleapis.com/css?family=' . $font );
	}
}

add_action( 'restaurant_wp_enqueue_scripts', 'restaurant_wp_google_font_body' );

/**
 * Content top site main
 */
function restaurant_wp_content_main_top() {
	if ( is_front_page() ) {
		echo '<h1>Front page</h1>';
	} else if ( is_author() ) {
		echo '<h1>Author</h1>';
	} else if ( is_search() ) {
		echo '<h1>Search</h1>';
	} else if ( is_archive() ) {
		echo '<h1>Archive</h1>';
	} else if ( is_singular() ) {
		echo '<h1>Singular</h1>';
	}
}

add_action( 'restaurant_wp_content_main_top', 'restaurant_wp_content_main_top' );