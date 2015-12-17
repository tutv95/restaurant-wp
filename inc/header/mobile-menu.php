<?php
if ( !is_active_sidebar( 'menu-right' ) ) {
	echo '<ul class="menu-right">';
	dynamic_sidebar( 'menu_right' );
	echo '</ul>';
}
?>
<ul class="nav navbar-nav">
	<?php
	if ( has_nav_menu( 'primary' || has_nav_menu( 'right' ) ) ) {
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