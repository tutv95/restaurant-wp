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
			<div class="col-md-9">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<section class="error-404 not-found">
							<header class="page-header">
								<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'restaurant-wp' ); ?></h2>
							</header><!-- .page-header -->

							<div class="page-content">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'restaurant-wp' ); ?></p>

								<?php
								get_search_form();

								the_widget( 'WP_Widget_Recent_Posts' );

								if ( restaurant_wp_categorized_blog() ) : // Only show the widget if site has multiple categories.
									?>

									<div class="widget widget_categories">
										<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'restaurant-wp' ); ?></h2>
										<ul>
											<?php
											wp_list_categories(
												array(
													'orderby'    => 'count',
													'order'      => 'DESC',
													'show_count' => 1,
													'title_li'   => '',
													'number'     => 10,
												)
											);
											?>
										</ul>
									</div><!-- .widget -->

									<?php
								endif;

								/* translators: %1$s: smiley */
								$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'restaurant-wp' ), convert_smilies( ':)' ) ) . '</p>';
								the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

								the_widget( 'WP_Widget_Tag_Cloud' );
								?>

							</div><!-- .page-content -->
						</section><!-- .error-404 -->

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php
get_footer();
