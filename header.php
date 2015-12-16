<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Restaurant_WP
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'restaurant-wp' ); ?></a>
	<header id="masthead" class="site-header affix-top" role="banner">
		<div class="container">
			<div class="row">
				<div class="navigation col-sm-12">
					<div class="tm-table">
						<div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</div>

						<div class="site-branding width-logo table-cell sm-logo">
							<?php do_action( 'restaurant_wp_logo' ); ?>
							<?php do_action( 'restaurant_wp_sticky_logo' ); ?>
						</div>

						<nav class="width-navigation table-cell table-right main-navigation">
							<div class="inner-navigation">
								<?php
								restaurant_wp_primary_menu();
								?>

								<ul class="menu-right">
									<?php
									if ( is_active_sidebar( 'menu_right' ) ) {
										dynamic_sidebar( 'menu_right' );
									}
									?>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<?php get_template_part( 'template-parts/top-main' ); ?>
	<div id="content" class="site-content">
