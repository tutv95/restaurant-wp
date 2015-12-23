<?php
if ( ! is_active_sidebar( 'menu-right' ) ) {
	echo '<div class="menu-right">';
	dynamic_sidebar( 'menu_right' );
	echo '</div>';
}
?>
<ul class="nav navbar-nav">
	<?php
	if ( has_nav_menu( 'mobile' ) ) {
		wp_nav_menu(
			array(
				'theme_location' => 'mobile',
				'container'      => false,
				'items_wrap'     => '%3$s'
			)
		);
	} else if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'items_wrap'     => '%3$s'
			)
		);
	} else {
		wp_nav_menu(
			array(
				'theme_location' => '',
				'container'      => false,
				'items_wrap'     => '%3$s'
			)
		);
	}
	?>
</ul>