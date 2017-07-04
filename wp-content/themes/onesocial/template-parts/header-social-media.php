<?php

	$social_links=onesocial_get_option( 'boss_footer_social_links' );
?>

<div id="header-social-media-area" class="text-right">
	<ul class="header-media-links">
		<li>
			<a href="<?=$social_links['facebook']?>" target="_blank"><i class="fa fa-facebook icon-social"></i></a>
		</li>
		<li>
			<a href="<?=$social_links['twitter']?>" target="_blank"><i class="fa fa-twitter icon-social"></i></a>
		</li>
		<li>
			<a href="<?=$social_links['linkedin']?>" target="_blank"><i class="fa fa-linkedin icon-social"></i></a>
		</li>
		
	</ul>

</div>

