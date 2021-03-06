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

<?php do_action( 'restaurant_wp_before' ); ?>

<div id="wrapper-container" class="wrapper">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'restaurant-wp' ); ?></a>
	<?php
	$option_data = restaurant_wp_get_theme_option_data();
	$header      = '';
	if ( isset( $option_data['restaurant_wp_sticky_menu'] ) && $option_data['restaurant_wp_sticky_menu'] == 0 ) {
		$header .= ' no-affix-top';
	} else {
		$header .= ' affix-top';
	}
	if ( isset( $option_data['restaurant_wp_header_style'] ) && $option_data['restaurant_wp_header_style'] == 'default' ) {
		$header .= ' header-default';
	} else {
		$header .= ' header-overlay';
	}
	?>
	<!-- menu for mobile -->
	<nav class="visible-xs mobile-menu-container mobile-effect" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<?php get_template_part( 'inc/header/mobile-menu' ); ?>
	</nav>
	<div class="content-pusher">
		<header id="masthead" class="site-header<?php echo $header ?>">
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

									<div class="menu-right">
										<?php
										if ( is_active_sidebar( 'menu_right' ) ) {
											dynamic_sidebar( 'menu_right' );
										}
										?>
									</div>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header><!-- #masthead -->
		<?php get_template_part( 'template-parts/top-main' ); ?>
		<div id="content" class="site-content">
