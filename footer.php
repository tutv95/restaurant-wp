<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Restaurant_WP
 */

?>

</div><!-- #content -->
<div id="main-bottom">
	<div class="container">
		<?php get_template_part( 'template-parts/sidebar', 'main-bottom' ); ?>
	</div>
</div><!-- #main-bottom -->
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<?php get_template_part( 'template-parts/sidebar', 'footer' ); ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'restaurant-wp' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'restaurant-wp' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'restaurant-wp' ), 'restaurant-wp', '<a href="http://wparena.com" rel="designer">WordPress Arena</a>' ); ?>
		</div><!-- .site-info -->
	</div>
</footer><!-- #colophon -->
</div><!-- content-pusher -->
</div><!-- wrapper-container -->

<?php do_action( 'restaurant_wp_back_to_top' ); ?>

<?php wp_footer(); ?>

</body>
</html>
