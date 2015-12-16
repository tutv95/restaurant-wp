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

<?php $image = get_header_image(); ?>
<div class="main-top">
	<?php if ( $image != false ) {
		echo '<img src="' . $image . '" />';
	} ?>
</div>
<!-- #main-top -->