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

<?php $image = get_header_image();

?>
<div id="main-top">
	<?php if ( get_header_image() != false ) {
		echo '<img src="' . $image . '" alt="' . esc_attr__( 'Custom header image', 'restaurant-wp' ) . '"/>';
	} ?>
	<div class="container-content">
		<div class="content container">
			<?php do_action( 'restaurant_wp_content_main_top' ); ?>
		</div>
	</div>
</div><!-- #main-top -->