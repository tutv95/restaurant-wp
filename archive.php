<?php
/**
 * The template for displaying archive pages.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Restaurant_WP
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="<?php restaurant_wp_layout_column_first(); ?>">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<?php
						if ( have_posts() ) : ?>
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>

					</main><!-- #main -->
					<?php
					restaurant_wp_paging_nav();
					?>
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
