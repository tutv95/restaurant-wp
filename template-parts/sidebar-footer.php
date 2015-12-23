<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 08/12/2015
 * Time: 1:42 AM
 *
 * @package Restaurant_WP
 */

if ( ! is_active_sidebar( 'footer' ) ) {
	return;
}
?>

<aside id="sidebar-footer" class="widget-area">
	<?php dynamic_sidebar( 'footer' ); ?>
</aside><!-- #secondary -->