<?php
/**
 * Restaurant WP Theme Customizer.
 *
 * @package Restaurant_WP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function restaurant_wp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}

add_action( 'customize_register', 'restaurant_wp_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function restaurant_wp_customize_preview_js() {
	wp_enqueue_script( 'restaurant_wp_customizer', RESWP_THEME_URL . 'assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}

add_action( 'customize_preview_init', 'restaurant_wp_customize_preview_js' );

require_once RESWP_THEME_DIR . 'inc/admin/customizer-options.php';

/**
 * Print Custom CSS by Customize
 */
function restaurant_wp_customize_css() {
	$theme_option_data = restaurant_wp_get_theme_option_data();

	?>
	<style>
		<?php do_action('restaurant_wp_style_head_top') ?>

		/* Width logo */
		<?php if ( isset($theme_option_data['restaurant_wp_width_logo']) ) {
			$width_logo = intval($theme_option_data['restaurant_wp_width_logo']);
		?>
		.width-logo {
			width: <?php echo $width_logo ?>px;
		}

		<?php } ?>

		/* Font body */
		<?php
		if ( isset( $theme_option_data['restaurant_wp_font_body'] ) ) {
			$key_font     = intval( $theme_option_data['restaurant_wp_font_body'] );
			$google_fonts = restaurant_wp_get_list_google_fonts();
			$font = $google_fonts[$key_font];
		?>
		body {
			font-family: "<?php echo $font; ?>" !important;
		}

		<?php } ?>

		/* Footer Background Image */
		<?php
		if ( isset( $theme_option_data['restaurant_wp_footer_background_image'] ) && is_numeric($theme_option_data['restaurant_wp_footer_background_image']) ) {
			$image_id = $theme_option_data['restaurant_wp_footer_background_image'];
		?>
		.site-footer {
			background-image: url('<?php echo wp_get_attachment_url( $image_id ); ?>');
		}

		<?php } ?>

		/* Header Background Color */
		<?php
		if ( isset( $theme_option_data['restaurant_wp_header_background_color'] ) ) {
			$header_background_color = $theme_option_data['restaurant_wp_header_background_color'];
		?>
		#masthead.affix-top, #masthead.no-affix-top {
			background-color: <?php echo $header_background_color; ?> !important;
		}

		<?php } ?>

		<?php do_action('restaurant_wp_style_head_bottom') ?>
	</style>
	<?php
}

add_filter( 'wp_head', 'restaurant_wp_customize_css' );
