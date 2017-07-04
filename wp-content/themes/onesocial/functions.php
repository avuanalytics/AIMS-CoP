<?php

/**
 * To view theme functions, navigate to /buddyboss-inc/theme.php
 *
 * @package OneSocial Theme
 */
$init_file = get_template_directory() . '/buddyboss-inc/init.php';

if ( !file_exists( $init_file ) ) {

	$err_msg = __( 'OneSocial cannot find the starter file, should be located at: *wp root*/wp-content/themes/buddyboss/buddyboss-inc/init.php', 'onesocial' );

	wp_die( $err_msg );
}

require_once( $init_file );
// Register custom strings with polylang

pll_register_string('header_home_welcome_text_title', 'Homepage welcome text','AIMS Custom');
pll_register_string('header_home_welcome_text_description', 'Homepage welcome text description','AIMS Custom');
pll_register_string('header_homepage_communities', 'Homepage AIMS communities','AIMS Custom');
pll_register_string('header_homepage_latest_community_posts', 'Homepage latest community posts','AIMS Custom');
pll_register_string('community', 'Community','AIMS Custom');
pll_register_string('communities', 'Communities','AIMS Custom');
pll_register_string('continue_reading', 'Continue Reading','AIMS Custom');
pll_register_string('more_community_posts', 'More Community Posts','AIMS Custom');


//show only posts in the current language
function polylang_translation_available()
{		
	global $polylang;
	$translationIds = $polylang->model->get_translations('post', get_the_ID());
	$currentLang = pll_get_post(get_the_ID(), pll_current_language());


	$show_post=false;
	if($currentLang==get_the_ID())
	{
		$show_post=true;
	}	
	
	return $show_post;
}

add_action('wp', 'redirect_private_page_to_login');

function redirect_private_page_to_login()
{

	$str = $_SERVER["REQUEST_URI"];
	if(substr($str, -1)=='/')
	{
		$str=rtrim($str, "/");
	}
	$array = explode("/", $str);	
	$search_term=end($array);

	global $wp_query, $wpdb;

	$post_type=$wp_query->query_vars['post_type'];

	if($post_type=='forum')
	{
 		$querystr = " SELECT * FROM $wpdb->posts WHERE 1=1 AND post_name = '$search_term' AND post_type = '$post_type'";	
		$pageposts = $wpdb->get_results($querystr, OBJECT);	

		if($pageposts)
		{
		    if ($pageposts[0]->post_status == "private" && !is_user_logged_in()) 
		    {
		    	$location = wp_login_url($str);

		    	wp_safe_redirect($location);
  				exit;
		    } 				
		}

	}
}
add_post_type_support('forum', array('thumbnail'));

add_filter( 'get_the_archive_title', function ($title) 
{

    if ( is_category() ) 
    {
    	$title = single_cat_title( '', false );
	} 
	elseif ( is_tag() ) 
	{
		$title = single_tag_title( '', false );
    } 
    elseif ( is_author() ) 
    {
    	$title = '<span class="vcard">' . get_the_author() . '</span>' ;
    }
    elseif ( 'news' == get_post_type()  ) 
    {
    	$title=ucwords(get_post_type());
    }

    return $title;

});