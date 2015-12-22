<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 21/12/2015
 * Time: 10:20 AM
 *
 * @package Restaurant_WP
 */

if ( ! isset( $instance['quick_menu'] ) ) {
	return;
}

$menu_id = $instance['quick_menu'];
$menu_style = $instance['menu_style'];
$columns      = intval( $instance['columns'] );
$class_columns = '';
if ($columns == 1) {
	$class_columns = 'menu_content_one_column';
} else {
	$class_columns = 'menu_content_two_column';
}

if ( get_post_type( $menu_id ) != 'erm_menu' ) {
	return;
}

$header_type  = $instance['header_type'];
$header_color = $instance['header_color'];
$header_title = get_the_title( $menu_id );

$header_background = '';
if ( isset( $instance['header_background'] ) ) {
	$header_background = wp_get_attachment_image_src( $instance['header_background'], 'full' );
}
$header_background_src = '';
if ( $header_background != false ) {
	$header_background_src = $header_background[0];
}

if ( $header_background_src != '' ) {
	$style_header = 'background-image: url(\'' . $header_background_src . '\');';
}

$style_header .= 'color: ' . $header_color . ';';
$title_menu = get_the_title( $menu_id );

// Menu items
$menu_items = get_post_meta( $menu_id, '_erm_menu_items', true );
if ( empty( $menu_items ) ) {
	return;
}
$menu_items = preg_split( '/,/', $menu_items );
?>
<div class="reswp_erm_menu">
	<div class="menu-title" style="<?php echo esc_attr( $style_header ); ?>">
		<?php echo '<' . $header_type . ' class="title">' . esc_html( $header_title ) . '</' . $header_type . '>'; ?>
	</div>
	<ul class="erm_menu_content layout-<?php echo esc_attr( $menu_style . ' ' . $class_columns ); ?>">
<?php

$args_query = array(
	'post_type' => 'erm_menu_item',
	'post__in' => $menu_items,
	'ignore_sticky_posts' => true,
	'order' => 'ASC',
);
$menu_query = new WP_Query( $args_query );

if ( $menu_query->have_posts() ) {
	while ( $menu_query->have_posts() ) {
		$menu_query->the_post();

		$item_id = get_the_ID();
		$visible = get_post_meta( $item_id, '_erm_visible', true );

		if ( $visible != 1 ) {
			continue;
		}

		$type_item    = get_post_meta( $item_id, '_erm_type', true );

		if ( $type_item == 'section' ) {
			?>
				<li class="erm_section">
					<h2 class="erm_section_title"><?php echo esc_html( get_the_title() ); ?></h2>
    				<div class="erm_section_desc"><?php the_content(); ?></div>
				</li>
			<?php
		} else {
			$has_thumbnail = has_post_thumbnail( $item_id );
			$prices        = get_post_meta( $item_id, '_erm_prices', true );
			if( $prices[0]['name'] != '' ) {
				$class = ' erm_product_active';
			} else {
				$class = '';
			}
			?>
				<li class="erm_product <?php echo ( $has_thumbnail ? 'with_image' : 'no_image' ); ?><?php echo $class; ?>">
					<div class="erm_product_content">
					<?php if ( $has_thumbnail ) {
						$image_id   = get_post_thumbnail_id( $item_id );
						$image_thumb  = wp_get_attachment_image_src( $image_id, 'thumbnail' )[0];
						$image_full   = wp_get_attachment_image_src( $image_id, 'full' )[0];
						$post_image = get_post( $image_id );
						?>
						<div class="item-left">
							<a target="_blank" href="<?php echo esc_url( $image_full ); ?>" class="image-popup" data-caption="<?php echo esc_attr( $post_image->post_excerpt ); ?>" data-desc="<?php echo esc_attr( $post_image->post_content ); ?>">
								<img class="erm_product_image" src="<?php echo esc_url( $image_thumb ); ?>" alt="">
							</a>
							<h3 class="erm_product_title"><span><?php echo esc_html( get_the_title() ); ?></span></h3>
							<div class="erm_product_desc"><?php the_content(); ?></div>
						</div>
					<?php } else { ?>
						<div class="item-left">
							<h3 class="erm_product_title"><span><?php echo esc_html( get_the_title() ); ?></span></h3>
							<div class="erm_product_desc"><?php the_content(); ?></div>
						</div>
					<?php } ?>
					<?php if ( $class != '' ) : ?>
						<div class="erm_product_price">
							<ul>
							<?php
								foreach ($prices as $price) {
									?>
									<li>
										<span class="name"><?php echo esc_html($price['name']); ?></span>
										<span class="price"><?php echo esc_html($price['value']); ?></span>
									</li>
									<?php
								}
 							?>
							</ul>
						</div>
					<?php else : ?>
						<div class="erm_product_price">
							<ul>
							<?php
								foreach ($prices as $price) {
									?>
									<li>
										<span class="name"><?php echo esc_html('Price'); ?></span>
										<span class="price"><?php echo esc_html($price['value']); ?></span>
									</li>
									<?php
								}
 							?>
							</ul>
						</div>
					<?php endif; ?>
					</div>
				</li>
			<?php
		}
	}
}

wp_reset_postdata();
echo '</ul>';
echo '</div>';