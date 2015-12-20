<?php
/**
 * Custom style
 *
 * @package Restaurant_WP
 */

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
		$font = $theme_option_data['restaurant_wp_font_body'];
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