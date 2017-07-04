<?php
/**
 * The template used for displaying page content in homepage.php
 *
 * @package WordPress
 * @subpackage OneSocial Theme
 * @since OneSocial Theme 1.0.0
 */

?>

<article>

	<div class="entry-content buddypress-content-wrap full-width" >
		<section class="buddypress-content">

			<?php
				if(onesocial_get_option( 'home_page_forums_option' ))
				{
			?>
			<div class="forums-inner-wrapper">
				<h3 class="section-title "><?php pll_e('Homepage AIMS communities')?></h3>
				<hr class="section-hr" />

					<?php //=$onesocial_options['header_home_title'] text-brown?>
					<?php //=onesocial_get_option( 'home_page_forums_section_header' )?>


				<?php
				global $wpdb;

				$stati=array('private','publish');
				$stati = join("','",$stati);
				$results = $wpdb->get_results( "SELECT * FROM wp_posts WHERE post_type = 'forum' AND post_status IN ('$stati') ", OBJECT );

			 	if($results): ?>

		 		<div class="forums-wrapper">
			 		<?php
			 		  	global $post;
			 			foreach($results as $post):

		 				setup_postdata( $post );

		 				if(polylang_translation_available())
		 				{

					?>
						<div class="forum-item box-bordered box-shadow box-hover">
							<a href="<?php the_permalink()?>">
								<div class="forum-item-inner ">
									<div class="icon-wrapper">

										<?php if(has_post_thumbnail()){ ?>

				                            <?php the_post_thumbnail('medium-thumb'); ?>

				                        <?php
				                    	}
				                        else{?>
				                        	<i class="fa fa-commenting"></i>
				                        <?php }?>
									</div>
									<div class="title-wrapper">

										<span><?php the_title(); ?> <?php  pll_e('')?></span>

									</div>
								</div>
							</a>
						</div>


					<?php } endforeach; ?>
					<?php wp_reset_postdata(); ?>
				</div>

	        	<?php endif; ?>

        	</div>
        	<?php }?>


        	<?php
				if(onesocial_get_option( 'home_page_posts_option' ))
				{
			?>
        	<div class="forums-inner-wrapper">
				<h3 class="section-title"><?php pll_e('Homepage latest community posts')?></h3>
				<hr class="section-hr" />

				<?php
				//$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	         	$wp_query_post = new WP_Query(array( 'post_type' => 'post','lang'=>pll_current_language()));
	         	$published_posts = $wp_query_post->post_count;

	         	//echo $published_posts; die;


			 	if($wp_query_post->have_posts()):

			 		$ctr=0;
			 	?>

		 			<div class="forums-wrapper">
				 		<?php while ($wp_query_post->have_posts()): $wp_query_post->the_post();


							if($ctr <intval(onesocial_get_option( 'home_page_posts_section_total' )))
							{
						?>

							<div class="forum-item">
								<a href="<?php the_permalink()?>" title="<?php the_title() ?>">
									<div class="forum-item-inner ">
										<?php if(has_post_thumbnail()){ ?>
			                            <div class="home-widget-blog-image">

			                                	<?php the_post_thumbnail('medium-thumb'); ?>

			                            </div>
			                            <?php }?>
										<div class="home-widget-blog-title">

											<span><?php the_title() ?></span>

										</div>
									</div>
								</a>
							</div>


						<?php } $ctr++; endwhile; ?>
					</div>
					<?php
						if($published_posts>intval(onesocial_get_option( 'home_page_posts_section_total' )))
						{?>
							<div class="home-readmore-wrapper">
								<a class="button" href="<?=site_url(pll_current_language().'/community-posts')?>"> <?php pll_e('More Community Posts')?></a>
							</div>

						<?php
						}
					?>
	        	<?php endif; ?>



	        	<?php wp_reset_postdata(); ?>

	        	 <?php //dynamic_sidebar( 'sidebar' ); ?>


        	</div>
        	<?php }?>
        </section>
        <div class="home-sidebar">
        	<?php get_sidebar(); ?>
        </div>

	</div>

</article>
