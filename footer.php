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
<div class="main-bottom">
	<div class="container">
		<?php get_template_part( 'template-parts/sidebar', 'main-bottom' ); ?>
	</div>
</div>
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<?php get_template_part( 'template-parts/sidebar', 'footer' ); ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'restaurant-wp' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'restaurant-wp' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'restaurant-wp' ), 'restaurant-wp', '<a href="http://tutran.me" rel="designer">Tu TV</a>' ); ?>
		</div><!-- .site-info -->
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
