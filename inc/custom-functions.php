<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 07/12/2015
 * Time: 7:38 PM
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
 * Logo
 */
function restaurant_wp_logo() {
	?>
	<a href="<?php echo get_home_url(); ?>" title="Restaurnt" rel="home" class="no-sticky-logo">
		<img src="http://demo.thimpress.com/resca/wp-content/uploads/2015/07/logo2.png" alt="Restaurant &amp; Coffee WordPress Theme – Resca" width="50" height="50">
	</a>
	<?php
}

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