<?php

if ( ! isset( $instance['tab'] ) ) {
	return;
}

$tabs      = count( $instance['tab'] );
$width     = 100 / $tabs;
$count_li  = 1;
$count_div = 1;

?>

<ul class="nav-tabs" role="tablist">
	<?php
	foreach ( $instance['tab'] as $tab ) {
		$title = $sub_title = $active = $icon = '';
		if ( isset( $tab['title'] ) ) {
			$title = $tab['title'];
		}
		if ( isset( $tab['sub_title'] ) ) {
			$sub_title = $tab['sub_title'];
		}
		if ( isset( $tab['image'] ) ) {
			$image = wp_get_attachment_image_src( $tab['image'], 'full' );
			$icon  = $image[0];
		}
		if ( $count_li == 1 ) {
			$active = 'active';
		}

		?>
		<li class="<?php echo $active; ?>" style="width: <?php echo $width . '%'; ?>">
			<a href="#reswp-widget-tab-<?php echo $title; ?>" data-toggle="tab">
			<span class="box">
				<?php if ( $icon != '' ): ?>
					<img src="<?php echo $icon; ?>" />
				<?php endif; ?>
				<span><?php echo $title; ?><span class="sub-title"><?php echo $sub_title; ?></span></span>
			</span>
			</a>
		</li>
		<?php
		$count_li ++;
	}
	?>
</ul>

<div class="tab-content">
	<?php
	foreach ( $instance['tab'] as $i => $tab ) {
		if ( $count_div == 1 ) {
			$content_active = ' active';
		} else {
			$content_active = '';
		}
		if ( $instance['columns'] == 1 ) {
			$columns = 'menu_content_one_column';
		} else {
			$columns = 'menu_content_two_column';
		}
		$menu_style = $instance['menu_style'];
		$title      = $tab['title'];
		?>
		<div role="tabpanel" id="reswp-widget-tab-<?php echo $title; ?>" class="tab-pane fadeIn<?php echo $content_active; ?>">
			<div class="reswp_erm_menu">
				<ul class="erm_menu_content layout-<?php echo $menu_style . ' ' . $columns; ?> ">
					<?php
					$menu_id = $tab['quick_menu'];
					if ( get_post_type( $menu_id ) != 'erm_menu' ) {
						return;
					}
					// Menu item
					$menu_items = get_post_meta( $menu_id, '_erm_menu_items', true );
					if ( empty( $menu_items ) ) {
						return;
					}
					$menu_items = preg_split( '/,/', $menu_items );
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
													<span><?php echo esc_html( get_the_title() ); ?></span></h3>

												<div class="erm_product_desc"><?php the_content(); ?></div>
											</div>
										<?php } else { ?>
											<div class="item-left">
												<h3 class="erm_product_title">
													<span><?php echo esc_html( get_the_title() ); ?></span></h3>

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
																<span class="name"><?php echo esc_html( 'Price' ); ?></span>
															<?php else : ?>
																<span class="name"><?php echo esc_html( $price['name'] ); ?></span>
															<?php endif; ?>
															<span class="price"><?php echo esc_html( $price['value'] ); ?></span>
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
		</div>
		<?php
		$count_div ++;
	}
	?>
</div>
