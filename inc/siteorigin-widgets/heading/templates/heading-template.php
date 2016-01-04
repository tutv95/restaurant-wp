<div class="reswp_heading">
	<?php if ( isset( $instance['sub_title'] ) ) {
		echo '<div class="sub_heading">' . $instance['sub_title'] . '</div>';
	} ?>

	<?php if ( isset( $instance['title'] ) ) {
		printf( '<%1$s class="title_heading">%2$s</%1$s>', $instance['heading_size'], $instance['title'] );
	} ?>
</div>