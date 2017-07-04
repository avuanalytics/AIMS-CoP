<?php
/**
 * Template Name: Home Page Template
 *
 * Description: Use this page template for a page with VC plugin.
 *
 * @package WordPress
 * @subpackage OneSocial Theme
 * @since OneSocial 1.0.0
 */
get_header();
?>

<div id="primary" class="site-content">
    
	<div id="content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php comments_template( '', true ); ?>
		<?php endwhile; // end of the loop.  ?>

		
		<?php 	//print_r(json_encode($onesocial_options['boss_footer_social_links'])); die;
			if($onesocial_options['home_header_text_option']==1)			
			{?>
				<article class="home-header-section">


						<div class="header-area">
								<h2 class="entry-title text-brown">
									<?php pll_e('Homepage welcome text');?>
								</h2>

						</div><!-- /.header-area -->
						<div class="header-area-description">
								<?php ///pll_e('Homepage welcome text description');?>
						</div>

			</article><!-- #post -->
		<?php } ?>

		<?php get_template_part( 'template-parts/content-forum-posts', 'page' ); ?>

	
	</div>

</div>

<?php
get_footer();
