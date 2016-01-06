<?php

$css = '';

if ( isset( $instance['custom_font_heading']['custom_text_color'] ) ) {
	$css .= 'color:' . $instance['custom_font_heading']['custom_text_color'] . ';';
}
if ( isset( $instance['custom_font_heading']['custom_font_size'] ) ) {
	$css .= 'font-size:' . $instance['custom_font_heading']['custom_font_size'] . 'px;';
}
if ( isset( $instance['custom_font_heading']['custom_font_weight'] ) ) {
	$css .= 'font-weight:' . $instance['custom_font_heading']['custom_font_weight'] . ';';
}
if ( $instance['custom_font_heading']['custom_font_style'] <> '' ) {
	$css .= 'font-style:' . $instance['custom_font_heading']['custom_font_style'] . ';';
}

if ( $css != '' ) {
	$css = ' style="' . $css . '"';
}

?>


<div class="reswp_heading">
	<?php if ( isset( $instance['sub_title'] ) ) {
		echo '<div class="sub_heading">' . $instance['sub_title'] . '</div>';
	} ?>

	<?php if ( isset( $instance['title'] ) ) {
		printf( '<%1$s class="title_heading" %3$s>%2$s</%1$s>', $instance['heading_size'], $instance['title'], $css );
	} ?>
</div>