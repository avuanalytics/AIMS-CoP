<?php
/**
 * Template Name: News List
 *
 * Description: Use this page template for a page with no sidebars.
 *
 * @package WordPress
 * @subpackage OneSocial Theme
 * @since OneSocial 1.0.0
 */
get_header();
?>
	
	<div id="primary" class="site-content">

		<div id="content" role="main">

			<?php
			if ( is_home() && is_user_logged_in() && function_exists( 'buddyboss_sap' ) && onesocial_get_option('onesocial_adding_posts') ) {
				get_template_part( 'template-parts/create-post' );
			}
			?>


			<!-- Display blog posts -->
			<?php 

			$wp_query = new WP_Query(array( 'post_type' => 'news' ));

			if ( $wp_query->have_posts() ) : ?>

				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

					<div class="article-outher">

						<?php get_template_part( 'template-parts/content', 'author' ); ?>
						
						<div class="content-wrap news-content-wrapper">
							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
						</div>

					</div>

					<!-- /.article-outher -->

				<?php endwhile; ?>

				<div class="pagination-below">
					<?php buddyboss_pagination(); ?>
				</div>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; // end have_posts() check     ?>

		</div><!-- #content -->

	</div><!-- #primary -->
	<?php get_sidebar(); ?>
<?php
get_footer();
