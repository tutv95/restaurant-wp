<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 23/12/2015
 * Time: 10:20 AM
 *
 * @package Restaurant_WP
 */
?>
<?php
if ( count( $instance['tab'] ) == 0 ) {
	return;
}

$tabs       = $instance['tab'];
$columns    = $instance['columns'];
$menu_style = $instance['menu_style'];

$class_columns = '';
if ( $columns == 1 ) {
	$class_columns = 'menu_content_one_column';
} else {
	$class_columns = 'menu_content_two_column';
}

?>
<div class="filter_restaurant_menu">
	<div class="wrapper-filter-controls">
		<div class="filter-controls">
			<div class="filter active" data-filter="all"><?php esc_html_e( 'All', 'restaurant-wp' ); ?></div>
			<?php foreach ( $tabs as $index => $tab ) :
				$menu_id = intval( $tab['quick_menu'] );
				?>
				<div class="filter" data-filter=".menu-item-<?php echo esc_attr( $menu_id ); ?>"><?php echo esc_html( get_the_title( $menu_id ) ); ?></div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="wrapper-filter-restaurant-menu">
		<?php
		foreach ( $tabs as $index => $tab ) {
			$title    = $tab['title'];
			$subtitle = $tab['title'];
			$image_id = intval( $tab['image'] );
			$menu_id  = intval( $tab['quick_menu'] );

			if ( get_post_type( $menu_id ) != 'erm_menu' ) {
				return;
			}

			$title_menu = get_the_title( $menu_id );

			// Menu items
			$menu_items = get_post_meta( $menu_id, '_erm_menu_items', true );
			if ( empty( $menu_items ) ) {
				return;
			}
			$menu_items = preg_split( '/,/', $menu_items );
			?>
			<div class="reswp_erm_menu mix menu-item-<?php echo esc_attr( $menu_id ); ?>">
				<ul class="erm_menu_content layout-<?php echo esc_attr( $menu_style . ' ' . $class_columns ); ?>">
					<?php

					$args_query = array(
						'post_type'           => 'erm_menu_item',
						'post__in'            => $menu_items,
						'ignore_sticky_posts' => true,
						'order'               => 'ASC',
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

							$type_item = get_post_meta( $item_id, '_erm_type', true );

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

								if ( $prices != null && $prices[0]['name'] != '' ) {
									$class = ' erm_product_active';
								} else {
									$class = '';
								}

								?>
								<li class="erm_product <?php echo( $has_thumbnail ? 'with_image' : 'no_image' ); ?><?php echo $class; ?>">
									<div class="erm_product_content">
										<?php if ( $has_thumbnail ) {
											$image_id    = get_post_thumbnail_id( $item_id );
											$image_thumb = wp_get_attachment_image_src( $image_id, 'thumbnail' )[0];
											$image_full  = wp_get_attachment_image_src( $image_id, 'full' )[0];
											$post_image  = get_post( $image_id );
											?>
											<div class="item-left">
												<a target="_blank" href="<?php echo esc_url( $image_full ); ?>" class="image-popup" data-caption="<?php echo esc_attr( $post_image->post_excerpt ); ?>" data-desc="<?php echo esc_attr( $post_image->post_content ); ?>">
													<img class="erm_product_image" src="<?php echo esc_url( $image_thumb ); ?>" alt="">
												</a>

												<h3 class="erm_product_title">
													<span><?php echo esc_html( get_the_title() ); ?></span>
												</h3>

												<div class="erm_product_desc"><?php the_content(); ?></div>
											</div>
										<?php } else { ?>
											<div class="item-left">
												<h3 class="erm_product_title">
													<span><?php echo esc_html( get_the_title() ); ?></span>
												</h3>

												<div class="erm_product_desc"><?php the_content(); ?></div>
											</div>
										<?php } ?>
										<?php if ( $class != '' ) : ?>
											<div class="erm_product_price">
												<ul>
													<?php
													foreach ( $prices as $price ) {
														?>
														<li>
															<?php if ( $price['name'] == '' ) : ?>
																<span class="name"><?php esc_html_e( 'Price', 'restaurant-wp' ); ?></span>
															<?php else : ?>
																<span class="name"><?php echo esc_html( $price['name'] ); ?></span>
															<?php endif; ?>
															<span class="price"><?php echo apply_filters( 'erm_filter_price', $price['value'] ); ?></span>
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
					?>
				</ul>
			</div>
			<?php
		}
		?>
	</div>
</div>