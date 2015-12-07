<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 08/12/2015
 * Time: 1:42 AM
 */

if ( ! is_active_sidebar( 'menu-right' ) ) {
	return;
}
?>

<aside id="sidebar-menu-right" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'menu-right' ); ?>
</aside><!-- #secondary -->