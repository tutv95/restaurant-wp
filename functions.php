<?php
/**
 * Restaurant WP functions and definitions.
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Restaurant_WP
 */

/**
 * Variables
 */
require get_template_directory() . '/inc/variables.php';

if ( ! function_exists( 'restaurant_wp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function restaurant_wp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Restaurant WP, use a find and replace
		 * to change 'restaurant-wp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'restaurant-wp', RESWP_THEME_DIR . 'languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'restaurant-wp' ),
				'mobile'  => esc_html__( 'Mobile menu', 'restaurant-wp' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support(
			'post-formats', array(
				'aside',
				'image',
				'video',
				'audio',
				'quote',
				'link',
				'gallery',
				'chat',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background', apply_filters(
				'restaurant_wp_custom_background_args', array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
	}
endif; // restaurant_wp_setup
add_action( 'after_setup_theme', 'restaurant_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function restaurant_wp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'restaurant_wp_content_width', 640 );
}

add_action( 'after_setup_theme', 'restaurant_wp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function restaurant_wp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'restaurant-wp' ),
			'id'            => 'sidebar',
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Menu right', 'restaurant-wp' ),
			'id'            => 'menu_right',
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Main bottom', 'restaurant-wp' ),
			'id'            => 'main_bottom',
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'restaurant-wp' ),
			'id'            => 'footer',
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		)
	);
}

add_action( 'widgets_init', 'restaurant_wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function restaurant_wp_scripts() {
	wp_enqueue_style( 'restaurant-wp-style', get_stylesheet_uri(), array(), RESWP_THEME_VERSION );

	wp_enqueue_script( 'restaurant-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );

	wp_enqueue_script( 'restaurant-parallax', get_template_directory_uri() . '/assets/js/parallax.min.js', array( 'jquery' ), '1.3.1', true );

	wp_enqueue_script( 'restaurant-custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery', 'restaurant-bootstrap' ), RESWP_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	do_action( 'restaurant_wp_enqueue_scripts' );
}

add_action( 'wp_enqueue_scripts', 'restaurant_wp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require RESWP_THEME_DIR . 'inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require RESWP_THEME_DIR . 'inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require RESWP_THEME_DIR . 'inc/extras.php';

/**
 * Customizer additions.
 */
require RESWP_THEME_DIR . 'inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require RESWP_THEME_DIR . 'inc/jetpack.php';

/**
 * Custom functions
 */
require RESWP_THEME_DIR . 'inc/custom-functions.php';

/**
 * Require plugins
 */
if ( is_admin() && current_user_can( 'manage_options' ) ) {
	require RESWP_THEME_DIR . 'inc/admin/plugins-require.php';
}