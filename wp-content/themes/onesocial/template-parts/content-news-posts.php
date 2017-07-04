<?php
/**
 * The template used for displaying page content in newspage.php
 *
 * @package WordPress
 * @subpackage OneSocial Theme
 * @since OneSocial Theme 1.0.0
 */

?>

<article>

	<div class="entry-content buddypress-content-wrap full-width" >
		<section class="buddypress-content">
			
        	<div class="forums-inner-wrapper">
				<h3 class="section-title">Latest Community Posts</h3>
				<hr class="section-hr" />

				<?php
				//$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	         	$wp_query_post = new WP_Query(array( 'post_type' => 'news' ));
	         	//$published_posts = wp_count_posts()->publish;

	         	//print_r($wp_query); die;

			 	if($wp_query_post->have_posts()): ?>
		 		
		 			<div class="forums-wrapper">
				 		<?php while ($wp_query_post->have_posts()): $wp_query_post->the_post();									 
							
						?> 
						
							<div class="forum-item">
								<a href="<?php the_permalink()?>">
									<div class="forum-item-inner ">
										<?php if(has_post_thumbnail()){ ?>
			                            <div class="home-widget-blog-image">
			                            	 
			                                	<?php the_post_thumbnail('medium-thumb'); ?>
			                               
			                            </div>
			                            <?php }?>
										<div class="home-widget-blog-title">
												
											<span><?php the_title(); ?></span>

										</div>
									</div>
								</a>
							</div>

					
						<?php endwhile; ?>
					</div>
					<?php 
						/*if($published_posts>3)
						{?>
							<div class="home-readmore-wrapper">
								<a class="button" href="#"> More Community Posts</a>
							</div>
							
						<?php
						}*/
					?>
	        	<?php endif; ?>	



	        	<?php wp_reset_postdata(); ?>

	        	 <?php //dynamic_sidebar( 'sidebar' ); ?>	
				
				
        	</div>

        </section>
        <div class="home-sidebar">
        	<?php get_sidebar(); ?>
        </div>

	</div>

</article>