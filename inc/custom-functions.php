<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 07/12/2015
 * Time: 7:38 PM
 *
 * Custom functions
 *
 * @package Restaurant_WP
 */

/**
 * Widget
 */
require RESWP_THEME_DIR . 'inc/widgets/widgets.php';

/**
 * Google fonts
 */
require RESWP_THEME_DIR . 'inc/google-fonts.php';

/**
 * Rewrite uri stylesheet
 */
function restaurant_wp_rewrite_uri_stylesheet() {
	return get_stylesheet_directory_uri() . '/style.v1.min.css?time=' . md5( time() );
}

add_action( 'stylesheet_uri', 'restaurant_wp_rewrite_uri_stylesheet' );

/**
 * Get Theme Option Data
 */
function restaurant_wp_get_theme_option_data() {
	$theme_options_data = get_theme_mods();

	return $theme_options_data;
}

/**
 * Add class to body class (CSS)
 *
 * @param $classes
 *
 * @return array
 */
function restaurant_wp_add_class_to_body( $classes ) {
	$theme_option_data = restaurant_wp_get_theme_option_data();

	// Header style
	if ( isset( $theme_option_data['restaurant_wp_header_style'] ) && $theme_option_data['restaurant_wp_header_style'] == 'overlay' ) {
		$classes[] = 'header_overlay';
	} else {
		$classes[] = 'header_default';
	}

	// Sticky menu
	if ( isset( $theme_option_data['restaurant_wp_sticky_menu'] ) && $theme_option_data['restaurant_wp_sticky_menu'] ) {
		$classes[] = 'sticky_menu';
	} else {
		$classes[] = 'no_sticky_menu';
	}

	// Them layout
	if ( restaurant_wp_get_theme_layout() == 'full' ) {
		$classes[] = 'layout-full-width';
	} elseif ( restaurant_wp_get_theme_layout() == 'left' ) {
		$classes[] = 'layout-sidebar-left';
	} else {
		$classes[] = 'layout-sidebar-right';
	}

	/**
	 * Preloader
	 */
	if ( isset( $theme_option_data['restaurant_wp_display_preloader'] ) && $theme_option_data['restaurant_wp_display_preloader'] ) {
		$classes[] = 'preloader-active';
	}

	return $classes;
}

add_filter( 'body_class', 'restaurant_wp_add_class_to_body' );


/**
 * Logo
 */
function restaurant_wp_logo() {
	$option_data = restaurant_wp_get_theme_option_data();
	if ( isset( $option_data['restaurant_wp_header_logo'] ) && is_numeric( $option_data['restaurant_wp_header_logo'] ) ) {
		$id_image = $option_data['restaurant_wp_header_logo'];
		?>
		<a href="<?php echo get_home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" rel="home" class="no-sticky-logo">
			<?php echo wp_get_attachment_image( $id_image, 'full' ); ?>
		</a>
		<?php
	} else {
		?>
		<a href="<?php echo get_home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" rel="home" class="no-sticky-logo">
			<img src="<?php echo esc_url( RESWP_THEME_URL . 'assets/images/logo.png' ) ?>" />
		</a>
		<?php
	}
}

add_action( 'restaurant_wp_logo', 'restaurant_wp_logo' );

/**
 * Sticky logo
 */
function restaurant_wp_sticky_logo() {
	$option_data = restaurant_wp_get_theme_option_data();

	if ( isset( $option_data['restaurant_wp_sticky_logo'] ) && is_numeric( $option_data['restaurant_wp_sticky_logo'] ) ) {
		$id_image = $option_data['restaurant_wp_sticky_logo'];
		?>
		<a href="<?php echo get_home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" rel="home" class="sticky-logo">
			<?php echo wp_get_attachment_image( $id_image, 'full' ); ?>
		</a>
		<?php
	} else {
		$option_data = restaurant_wp_get_theme_option_data();
		if ( isset( $option_data['restaurant_wp_header_logo'] ) && is_numeric( $option_data['restaurant_wp_header_logo'] ) ) {
			$id_image = $option_data['restaurant_wp_header_logo'];
			?>
			<a href="<?php echo get_home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" rel="home" class="sticky-logo">
				<?php echo wp_get_attachment_image( $id_image, 'full' ); ?>
			</a>
			<?php
		} else {
			?>
			<a href="<?php echo get_home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" rel="home" class="sticky-logo">
				<img src="<?php echo esc_url( RESWP_THEME_URL . 'assets/images/logo.png' ) ?>" />
			</a>
			<?php
		}
	}
}

add_action( 'restaurant_wp_sticky_logo', 'restaurant_wp_sticky_logo' );

/**
 * Post share
 */
function restaurant_wp_post_share() {
	$theme_option_data = restaurant_wp_get_theme_option_data();

	$list_share = '';

	if ( is_sticky() ) {
		$list_share .= '<li><a class="sticky" href="' . get_the_permalink() . '" title="' . esc_attr__( 'Sticky Post', 'restaurant-wp' ) . '"><i class="fa fa-bolt"></i></a></li>';
	} else {
		$list_share .= restaurant_wp_post_format_icon_font();
	}

	if ( isset( $theme_option_data['restaurant_wp_sharing_facebook'] ) && $theme_option_data['restaurant_wp_sharing_facebook'] ) {
		$list_share .= '<li><a target="_blank" class="facebook" href="https://www.facebook.com/sharer.php?s=100&amp;p[title]=' . get_the_title() . '&amp;p[url]=' . urlencode( get_permalink() ) . '&amp;p[images][0]=' . urlencode( wp_get_attachment_url( get_post_thumbnail_id() ) ) . '" title="' . esc_attr__( 'Facebook', 'restaurant-wp' ) . '"><i class="fa fa-facebook"></i></a></li>';
	}

	if ( isset( $theme_option_data['restaurant_wp_sharing_twitter'] ) && $theme_option_data['restaurant_wp_sharing_twitter'] ) {
		$list_share .= '<li><a target="_blank" class="twitter" href="https://twitter.com/share?url=' . urlencode( get_permalink() ) . '&amp;text=' . esc_attr( get_the_title() ) . '" title="' . esc_attr__( 'Twitter', 'restaurant-wp' ) . '"><i class="fa fa-twitter"></i></a></li>';
	}

	if ( isset( $theme_option_data['restaurant_wp_sharing_google'] ) && $theme_option_data['restaurant_wp_sharing_google'] ) {
		$list_share .= '<li><a target="_blank" class="googleplus" href="https://plus.google.com/share?url=' . urlencode( get_permalink() ) . '&amp;title=' . esc_attr( get_the_title() ) . '" title="' . esc_attr__( 'Google Plus', 'restaurant-wp' ) . '" onclick=\'window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;\'><i class="fa fa-google"></i></a></li>';
	}

	if ( isset( $theme_option_data['restaurant_wp_sharing_pinterest'] ) && $theme_option_data['restaurant_wp_sharing_pinterest'] ) {
		$list_share .= '<li><a target="_blank" class="pinterest" href="http://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&amp;description=' . get_the_excerpt() . '&media=' . urlencode( wp_get_attachment_url( get_post_thumbnail_id() ) ) . '" onclick="window.open(this.href); return false;" title="' . esc_attr__( 'Pinterest', 'restaurant-wp' ) . '"><i class="fa fa-pinterest"></i></a></li>';
	}

	if ( $list_share != '' ) {
		echo '<ul class="social-share">';
		echo $list_share;
		echo '</ul>';
	}
}

add_action( 'restaurant_wp_post_share', 'restaurant_wp_post_share' );

/**
 * Entry top
 *
 * @param string $size Size image thumbnail.
 */
function restaurant_wp_entry_top( $size ) {
	if ( has_post_thumbnail() ) {
		echo '<a href="' . esc_url( get_the_permalink() ) . '" title="' . esc_attr( get_the_title() ) . '">' . get_the_post_thumbnail( get_the_ID(), $size ) . '</a>';
	}
}

add_action( 'restaurant_wp_entry_top', 'restaurant_wp_entry_top' );

/**
 * Enqueue web font
 */

function restaurant_wp_google_font_body() {
	$theme_option_data = restaurant_wp_get_theme_option_data();

	if ( isset( $theme_option_data['restaurant_wp_font_body'] ) ) {
		$font = $theme_option_data['restaurant_wp_font_body'];
		wp_enqueue_style( 'restaurant_wp_google_font_' . strtolower( str_replace( ' ', '_', $font ) ), '//fonts.googleapis.com/css?family=' . $font );
	}
}

add_action( 'restaurant_wp_enqueue_scripts', 'restaurant_wp_google_font_body' );

/**
 * Content top site main
 */
function restaurant_wp_content_main_top() {
	if ( is_front_page() ) {// Front page
		echo '<h1 class="title">' . get_bloginfo( 'name' ) . '</h1>';
		echo '<div class="description">' . get_bloginfo( 'description' ) . '</div>';
	} elseif ( is_home() ) {// Post page
		echo '<h1 class="title">' . esc_html__( 'Blog', 'restaurant-wp' ) . '</h1>';
		echo '<div class="description">' . get_bloginfo( 'description' ) . '</div>';
	} elseif ( is_page() ) {// Page
		echo '<h1 class="title">' . get_the_title() . '</h1>';
	} elseif ( is_single() ) {// Single
		$post_id = get_the_ID();

		if ( get_post_type( $post_id ) == 'post' ) {
			$categories = get_the_category();
		} elseif ( get_post_type( $post_id ) == 'attachment' ) {
			echo '<h2 class="title">' . esc_html( 'Attachment' ) . '</h2>';
			echo '<div class="description">' . get_the_title() . '</div>';

			return;
		} else {// Custom post type
			$categories = get_the_terms( $post_id, 'taxonomy' );
		}

		if ( ! empty( $categories ) ) {
			echo '<h2 class="title">' . esc_html( $categories[0]->name ) . '</h2>';
		}
	} elseif ( is_author() ) {// Author
		echo '<h1 class="title">' . esc_html__( 'Author', 'restaurant-wp' ) . '</h1>';
		echo '<div class="description">' . get_the_author() . '</div>';
	} elseif ( is_search() ) {// Search
		echo '<h1 class="title">' . esc_html__( 'Search', 'restaurant-wp' ) . '</h1>';
		echo '<div class="description">' . get_search_query() . '</div>';
	} elseif ( is_tag() ) {// Tag
		echo '<h1 class="title">' . esc_html__( 'Tag', 'restaurant-wp' ) . '</h1>';
		echo '<div class="description">' . single_tag_title( '', false ) . '</div>';
	} elseif ( is_category() ) {// Archive
		echo '<h1 class="title">' . esc_html__( 'Category', 'restaurant-wp' ) . '</h1>';
		echo '<div class="description">' . single_cat_title( '', false ) . '</div>';
	} elseif ( is_404() ) {
		echo '<h1 class="title">' . esc_html__( 'Page Not Found!', 'restaurant-wp' ) . '</h1>';
	} elseif ( is_date() ) {
		//		var_dump( $GLOBALS['wp_locale']->get_month( $monthnum ) );
		if ( is_year() ) {
			echo '<h1 class="title">' . esc_html__( 'Year', 'restaurant-wp' ) . '</h1>';
		} elseif ( is_month() ) {
			echo '<h1 class="title">' . esc_html__( 'Month', 'restaurant-wp' ) . '</h1>';
		} elseif ( is_day() ) {
			echo '<h1 class="title">' . esc_html__( 'Day', 'restaurant-wp' ) . '</h1>';
		}

		$date  = '';
		$day   = intval( get_query_var( 'day' ) );
		$month = intval( get_query_var( 'monthnum' ) );
		$year  = intval( get_query_var( 'year' ) );
		$m     = get_query_var( 'm' );

		if ( ! empty( $m ) ) {
			$year  = intval( substr( $m, 0, 4 ) );
			$month = intval( substr( $m, 4, 2 ) );
			$day   = substr( $m, 6, 2 );

			if ( strlen( $day ) > 1 ) {
				$day = intval( $day );
			} else {
				$day = 0;
			}
		}

		if ( $day > 0 ) {
			$date .= $day . ' ';
		}
		if ( $month > 0 ) {
			global $wp_locale;
			$date .= $wp_locale->get_month( $month ) . ' ';
		}
		$date .= $year;
		echo '<div class="description">' . $date . '</div>';
	}
}

add_action( 'restaurant_wp_content_main_top', 'restaurant_wp_content_main_top' );

/**
 * Back to top
 */
function restaurant_wp_back_to_top() {
	$theme_option_data = restaurant_wp_get_theme_option_data();

	if ( isset( $theme_option_data['restaurant_wp_display_back_to_top'] ) && $theme_option_data['restaurant_wp_display_back_to_top'] ) {
		echo '<a href="#" id="back-to-top" style="display: block;" class=""><i class="fa fa-chevron-up"></i></a>';
	}
}

add_action( 'restaurant_wp_back_to_top', 'restaurant_wp_back_to_top' );

/**
 * List Comment
 */
if ( ! function_exists( 'restaurant_wp_comment' ) ) {
	function restaurant_wp_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		//extract( $args, EXTR_SKIP );
		if ( 'div' == $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo esc_html( $tag ) . ' '; ?><?php comment_class( 'description_comment' ) ?> id="comment-<?php comment_ID() ?>">
		<?php
		if ( $args['avatar_size'] != 0 ) {
			echo get_avatar( $comment, $args['avatar_size'] );
		}
		?>
		<div class="comment-content">
			<div
				class="author"><?php printf( '<span class="author-name">%s</span>', get_comment_author_link() ) ?></div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'restaurant-wp' ) ?></em>
			<?php endif; ?>
			<div class="comment-extra-info">
				<div class="date"><?php printf( get_comment_date(), get_comment_time() ) ?></div>
				<?php comment_reply_link( array_merge( $args, array(
							'add_below' => $add_below,
							'depth'     => $depth,
							'max_depth' => $args['max_depth']
						) ) ) ?>
				<?php edit_comment_link( esc_html__( 'Edit', 'restaurant-wp' ), '', '' ); ?>
			</div>
			<div class="message">
				<?php comment_text() ?>
			</div>
			<div class="clear"></div>
		</div>
		<?php
	}
}

/**
 * Get theme layout
 *
 * @return string
 */
function restaurant_wp_get_theme_layout() {
	$theme_options_data = restaurant_wp_get_theme_option_data();

	$layout = 'right';

	if ( isset( $theme_options_data['restaurant_wp_theme_layout'] ) ) {
		$layout = $theme_options_data['restaurant_wp_theme_layout'];
	}

	return $layout;
}

/**
 * Class layout column first
 */
function restaurant_wp_layout_column_first() {
	if ( restaurant_wp_get_theme_layout() == 'right' ) {
		echo 'col-md-9';
	} elseif ( restaurant_wp_get_theme_layout() == 'left' ) {
		echo 'col-md-9 col-md-push-3';
	} else {
		echo 'col-md-12';
	}
}


/**
 * Class layout column second
 */
function restaurant_wp_layout_column_second() {
	if ( restaurant_wp_get_theme_layout() == 'right' ) {
		echo 'col-md-3';
	} elseif ( restaurant_wp_get_theme_layout() == 'left' ) {
		echo 'col-md-3 col-md-pull-9';
	}
}

/**
 * pagination
 */

if ( ! function_exists( 'restaurant_wp_paging_nav' ) ) :

	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function restaurant_wp_paging_nav() {
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );

		$query_args = array();
		$url_parts  = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = esc_url( remove_query_arg( array_keys( $query_args ), $pagenum_link ) );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
				'base'      => $pagenum_link,
				'format'    => $format,
				'total'     => $GLOBALS['wp_query']->max_num_pages,
				'current'   => $paged,
				'mid_size'  => 2,
				'add_args'  => array_map( 'urlencode', $query_args ),
				'prev_text' => '<i class="fa fa-angle-left"></i>',
				'next_text' => '<i class="fa fa-angle-right"></i>',
				'type'      => 'array'
			) );

		if ( $links ) :
			?>
			<ul class="loop-pagination">
				<?php
				foreach ( $links as $link ) {
					echo '<li>' . $link . '</li>';
				}
				?>
			</ul>
			<!-- .pagination -->
			<?php
		endif;
	}
endif;

/**
 * Show icon post format
 *
 * @return string
 */
function restaurant_wp_post_format_icon_font() {
	$post_format  = get_post_format();
	$icon_font    = '';
	$title_format = '';
	if ( $post_format == 'aside' ) {
		$icon_font    = 'fa-sticky-note-o';
		$title_format = esc_html__( 'Aside', 'restaurant-wp' );
	} elseif ( $post_format == 'image' ) {
		$icon_font    = 'fa-picture-o';
		$title_format = esc_html__( 'Image', 'restaurant-wp' );
	} elseif ( $post_format == 'video' ) {
		$icon_font    = 'fa-film';
		$title_format = esc_html__( 'Video', 'restaurant-wp' );
	} elseif ( $post_format == 'quote' ) {
		$icon_font    = 'fa-quote-left';
		$title_format = esc_html__( 'Quote', 'restaurant-wp' );
	} elseif ( $post_format == 'link' ) {
		$icon_font    = 'fa-link';
		$title_format = esc_html__( 'Link', 'restaurant-wp' );
	} elseif ( $post_format == 'gallery' ) {
		$icon_font    = 'fa-picture-o';
		$title_format = esc_html__( 'Galley', 'restaurant-wp' );
	} elseif ( $post_format == 'audio' ) {
		$icon_font    = 'fa-music';
		$title_format = esc_html__( 'Audio', 'restaurant-wp' );
	} elseif ( $post_format == 'chat' ) {
		$icon_font    = 'fa-commenting-o';
		$title_format = esc_html__( 'Chat', 'restaurant-wp' );
	}

	if ( $icon_font == '' ) {
		return '';
	}

	return '<li><a class="post-format" href="' . get_the_permalink() . '" title="' . esc_attr( $title_format ) . '"><i class="fa ' . $icon_font . '"></i></a></li>';
}

function restaurant_wp_preloader() {
	$theme_option_data = restaurant_wp_get_theme_option_data();

	if ( isset( $theme_option_data['restaurant_wp_display_preloader'] ) && $theme_option_data['restaurant_wp_display_preloader'] ) {
		?>
		<div id="loader-wrapper">
			<div id="loader"></div>
		</div>
		<?php
	}
}

add_action( 'restaurant_wp_before', 'restaurant_wp_preloader' );

/**
 * Add SiteOrigin Widgets
 *
 * @param $folders
 *
 * @return array
 */
function restaurant_wp_add_siteorigin_widgets( $folders ) {
	$folders[] = RESWP_THEME_DIR . 'inc/siteorigin-widgets/';

	return $folders;
}

add_filter( 'siteorigin_widgets_widget_folders', 'restaurant_wp_add_siteorigin_widgets' );

/**
 * Custom ajax loader of contact form 7
 */

function my_wpcf7_ajax_loader() {
	return RESWP_THEME_URL . '/assets/images/loading.gif';
}

add_filter( 'wpcf7_ajax_loader', 'my_wpcf7_ajax_loader' );