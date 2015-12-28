<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 16/12/2015
 * Time: 5:30 PM
 *
 * Top site mains
 *
 * @package Restaurant_WP
 */
?>

<?php
if ( get_page_template_slug() == 'template-parts/page-siteorigin.php' ) {
	return;
}

$image = get_header_image();
?>
<div id="main-top" data-parallax="scroll" data-image-src="<?php echo esc_url( $image ); ?>">
	<?php if ( $image != false ) {
		echo '<img src="' . $image . '" alt="' . esc_attr__( 'Custom header image', 'restaurant-wp' ) . '"/>';
	} ?>
	<div class="container-content">
		<div class="content container">
			<?php do_action( 'restaurant_wp_content_main_top' ); ?>
		</div>
	</div>
</div><!-- #main-top -->