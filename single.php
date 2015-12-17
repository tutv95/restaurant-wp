<?php
/**
 * The template for displaying all single posts.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Restaurant_WP
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="<?php restaurant_wp_layout_column_first(); ?>">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', get_post_format() );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
			<?php if ( restaurant_wp_get_theme_layout() != 'full' ): ?>
				<div class="<?php restaurant_wp_layout_column_second(); ?>">
					<?php get_sidebar(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php
get_footer();
