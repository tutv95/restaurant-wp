<?php

if ( ! isset( $instance['height'] ) ) {
	return;
}

$height = $instance['height'];

echo '<div class="empty-spacing" style="width: 100%; height: '. $height . 'px">';
echo '</div>';