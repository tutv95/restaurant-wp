<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Restaurant_WP
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="<?php restaurant_wp_layout_column_first(); ?>">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<section class="error-404 not-found">
							<header class="page-header">
								<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'restaurant-wp' ); ?></h2>
							</header><!-- .page-header -->

							<div class="page-content">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'restaurant-wp' ); ?></p>

								<?php
								get_search_form();
								?>

							</div><!-- .page-content -->
						</section><!-- .error-404 -->

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
			<?php if ( restaurant_wp_get_theme_layout() != 'full' ) : ?>
				<div class="<?php restaurant_wp_layout_column_second(); ?>">
					<?php get_sidebar(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php
get_footer();
