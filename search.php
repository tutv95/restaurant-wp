<?php
/**
 * The template for displaying search results pages.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Restaurant_WP
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="<?php restaurant_wp_layout_column_first(); ?>">
				<section id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php
						if ( have_posts() ) : ?>

							<header class="page-header">
								<h2 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'restaurant-wp' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
							</header><!-- .page-header -->

							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile;

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>

					</main><!-- #main -->
					<?php
					restaurant_wp_paging_nav();
					?>
				</section><!-- #primary -->
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
