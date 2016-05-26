<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<?php
	if (have_posts()) : while (have_posts()) : the_post();
	$blog_id 			= get_current_blog_id();
	$blog_details 		= get_blog_details($blog_id);
	$sitename 			= $blog_details->blogname;
	$image 				= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$facebookURL 		= get_theme_mod('melt_facebook');
	$twitterURL 		= get_theme_mod('melt_twitter');
	$gplusURL 			= get_theme_mod('melt_gplus');
	$instagramURL 		= get_theme_mod('melt_instagram');
	$hasFacebook		= $facebookURL && $facebookURL != '';
	$hasTwitter			= $twitterURL && $twitterURL != '';

	date_default_timezone_set('America/New_York');
	$start_datetime = get_option('melt-checkin-start-datetime');
	$d1 = date('Y-m-d H:i:s', strtotime($start_datetime));
	$d1 = new DateTime($d1);
	$d2 = date('Y-m-d H:i:s');
	$d2 = new DateTime($d2);
	$end_datetime = get_option('melt-checkin-end-datetime');
	$d3 = date('Y-m-d H:i:s', strtotime($end_datetime));
	$d3 = new DateTime($d3);
	$checkin_active = ($d1 < $d2 && $d3 > $d2);
?>
<section id="masthead" class="page-header" role="banner">
	<a class="skip-link screen-reader-text" href="#content" data-backstretch="<?php echo $image; ?>">Skip to content</a>
	<div class="site-branding">
		<h1 class="entry-title"><?php echo $sitename; ?></h1>
		<?php


			if($checkin_active) { ?>
				<div class="truck-status">
					<i class="fa fa-map-marker"></i>
					<div class="current-address"><?php echo get_option('melt-street-address'); ?> <?php echo get_option('melt-city'); ?>, <?php echo get_option('melt-state'); ?></div>
					<a href="<?php echo home_url('/'); ?>contact/" class="btn-go">View Map<i class="fa fa-angle-right"></i></a>
				</div>
				<div class="truck-status--mobile">
					<div class="current-address"><span><i class="fa fa-map-marker"></i>We Are Here:</span><?php echo get_option('melt-street-address'); ?> <?php echo get_option('melt-city'); ?>, <?php echo get_option('melt-state'); ?></div>
					<a href="<?php echo home_url('/'); ?>contact/" class="btn-go">Get Directions</a>
					<a href="tel:<?php echo get_theme_mod('melt_phone_number') ?>" class="btn-go">Call <?php echo get_theme_mod('melt_phone_number') ?></a>
					<a href="<?php echo home_url('/'); ?>menu/" class="btn-go">View Our Menu</a>
				</div>
			<?php } else { ?>
				<div class="truck-status">
					<i class="fa fa-map-marker"></i>
					<div class="current-address">We're not on the move right now.</div>
				</div>
				<div class="truck-status--mobile">
					<div class="current-address">We're not on the move right now.</div>
					<a href="tel:<?php echo get_theme_mod('melt_phone_number') ?>" class="btn-go">Call <?php echo get_theme_mod('melt_phone_number') ?></a>
					<a href="<?php echo home_url('/'); ?>menu/" class="btn-go">View Our Menu</a>
				</div>
			<?php } ?>
	</div>
</section>
<section id="content" class="main-content about">
	<div class="container">
		<div class="row">
			<?php if ($hasFacebook && $hasTwitter) { ?>
				<div class="col-md-4">
					<div class="fb-page m-a" data-href="<?php echo $facebookURL; ?>" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo $facebookURL; ?>"><a href="<?php echo $facebookURL; ?>">Melt Mobile</a></blockquote></div></div>
				</div>
				<div class="col-md-4">
					<h2 class="text-center"><?php echo $sitename; ?></h2>
					<br>
					<div class="location-info">
						<h4><i class="fa fa-map-marker"></i> Current Location:</h4>
						<?php if($checkin_active){ ?>
						<p><?php echo get_option('melt-street-address'); ?><br><?php echo get_option('melt-city'); ?>, <?php echo get_option('melt-state'); ?> <?php echo get_option('melt-zipcode'); ?></p>
						<?php } else {?>
						<p>We're not on the move right now.</p>
						<?php } ?>
						<h4><i class="fa fa-phone"></i> Phone Number:</h4>
						<p><?php echo get_theme_mod('melt_phone_number') ?></p>
						<!-- SOCIAL LINKS -->
						<?php
							if ($facebookURL != '' || $twitterURL != '' || $gplusURL != '' || $instagramURL != '') {
						?>
						<h4>Stay Up To Date:</h4>
						<ul class="social-links m-a clearfix">
							<?php if ($facebookURL != '') { ?>
		                    	<li class="facebook"><a href="<?php echo $facebookURL; ?>"><i class="fa fa-facebook"></i></a></li>
		                    <?php } ?>
		                    <?php if ($twitterURL != '') { ?>
		                    	<li class="twitter"><a href="<?php echo $twitterURL; ?>"><i class="fa fa-twitter"></i></a></li>
		                    <?php } ?>
		                    <?php if ($gplusURL != '') { ?>
		                    	<li class="google-plus"><a href="<?php echo $gplusURL; ?>"><i class="fa fa-google-plus"></i></a></li>
		                    <?php } ?>
		                    <?php if ($instagramURL != '') { ?>
		                    	<li class="instagram"><a href="<?php echo $instagramURL; ?>"><i class="fa fa-instagram"></i></a></li>
		                    <?php } ?>
		                </ul>
		                <?php } ?>
					</div>
				</div>
				<div class="col-md-4">
					<a class="twitter-timeline" href="<?php echo $twitterURL; ?>" data-widget-id="729652589294424064">Tweets by @Melt_Mobile</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			<?php } elseif ($hasFacebook) { ?>
				<div class="col-md-6">
					<h2 class="text-center"><?php echo $sitename; ?></h2>
					<br>
					<div class="location-info">
						<h4><i class="fa fa-map-marker"></i> Current Location:</h4>
						<p><?php echo get_option('melt-street-address'); ?><br><?php echo get_option('melt-city'); ?>, <?php echo get_option('melt-state'); ?> <?php echo get_option('melt-zipcode'); ?></p>
						<h4><i class="fa fa-phone"></i> Phone Number:</h4>
						<p><?php echo get_theme_mod('melt_phone_number') ?></p>
						<!-- SOCIAL LINKS -->
						<?php
							if ($facebookURL != '' || $twitterURL != '' || $gplusURL != '' || $instagramURL != '') {
						?>
						<h4>Stay Up To Date:</h4>
						<ul class="social-links m-a clearfix">
							<?php if ($facebookURL != '') { ?>
		                    	<li class="facebook"><a href="<?php echo $facebookURL; ?>"><i class="fa fa-facebook"></i></a></li>
		                    <?php } ?>
		                    <?php if ($twitterURL != '') { ?>
		                    	<li class="twitter"><a href="<?php echo $twitterURL; ?>"><i class="fa fa-twitter"></i></a></li>
		                    <?php } ?>
		                    <?php if ($gplusURL != '') { ?>
		                    	<li class="google-plus"><a href="<?php echo $gplusURL; ?>"><i class="fa fa-google-plus"></i></a></li>
		                    <?php } ?>
		                    <?php if ($instagramURL != '') { ?>
		                    	<li class="instagram"><a href="<?php echo $instagramURL; ?>"><i class="fa fa-instagram"></i></a></li>
		                    <?php } ?>
		                </ul>
		                <?php } ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="fb-page m-a" data-href="<?php echo $facebookURL; ?>" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo $facebookURL; ?>"><a href="<?php echo $facebookURL; ?>">Melt Mobile</a></blockquote></div></div>
				</div>
			<?php } elseif ($hasTwitter) { ?>
				<div class="col-md-6">
					<h2 class="text-center"><?php echo $sitename; ?></h2>
					<br>
					<div class="location-info">
						<h4><i class="fa fa-map-marker"></i> Current Location:</h4>
						<p><?php echo get_option('melt-street-address'); ?><br><?php echo get_option('melt-city'); ?>, <?php echo get_option('melt-state'); ?> <?php echo get_option('melt-zipcode'); ?></p>
						<h4><i class="fa fa-phone"></i> Phone Number:</h4>
						<p><?php echo get_theme_mod('melt_phone_number') ?></p>
						<!-- SOCIAL LINKS -->
						<?php
							if ($facebookURL != '' || $twitterURL != '' || $gplusURL != '' || $instagramURL != '') {
						?>
						<h4>Stay Up To Date:</h4>
						<ul class="social-links m-a clearfix">
							<?php if ($facebookURL != '') { ?>
		                    	<li class="facebook"><a href="<?php echo $facebookURL; ?>"><i class="fa fa-facebook"></i></a></li>
		                    <?php } ?>
		                    <?php if ($twitterURL != '') { ?>
		                    	<li class="twitter"><a href="<?php echo $twitterURL; ?>"><i class="fa fa-twitter"></i></a></li>
		                    <?php } ?>
		                    <?php if ($gplusURL != '') { ?>
		                    	<li class="google-plus"><a href="<?php echo $gplusURL; ?>"><i class="fa fa-google-plus"></i></a></li>
		                    <?php } ?>
		                    <?php if ($instagramURL != '') { ?>
		                    	<li class="instagram"><a href="<?php echo $instagramURL; ?>"><i class="fa fa-instagram"></i></a></li>
		                    <?php } ?>
		                </ul>
		                <?php } ?>
					</div>
				</div>
				<div class="col-md-6">
					<a class="twitter-timeline" href="<?php echo $twitterURL; ?>" data-widget-id="729652589294424064">Tweets by @Melt_Mobile</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			<?php } else { ?>
				<div class="col-md-8 col-md-offset-2">
					<h2 class="text-center"><?php echo $sitename; ?></h2>
					<br>
					<div class="location-info">
						<h4><i class="fa fa-map-marker"></i> Current Location:</h4>
						<p><?php echo get_option('melt-street-address'); ?><br><?php echo get_option('melt-city'); ?>, <?php echo get_option('melt-state'); ?> <?php echo get_option('melt-zipcode'); ?></p>
						<h4><i class="fa fa-phone"></i> Phone Number:</h4>
						<p><?php echo get_theme_mod('melt_phone_number') ?></p>
						<!-- SOCIAL LINKS -->
						<?php
							if ($facebookURL != '' || $twitterURL != '' || $gplusURL != '' || $instagramURL != '') {
						?>
						<h4>Stay Up To Date:</h4>
						<ul class="social-links m-a clearfix">
							<?php if ($facebookURL != '') { ?>
		                    	<li class="facebook"><a href="<?php echo $facebookURL; ?>"><i class="fa fa-facebook"></i></a></li>
		                    <?php } ?>
		                    <?php if ($twitterURL != '') { ?>
		                    	<li class="twitter"><a href="<?php echo $twitterURL; ?>"><i class="fa fa-twitter"></i></a></li>
		                    <?php } ?>
		                    <?php if ($gplusURL != '') { ?>
		                    	<li class="google-plus"><a href="<?php echo $gplusURL; ?>"><i class="fa fa-google-plus"></i></a></li>
		                    <?php } ?>
		                    <?php if ($instagramURL != '') { ?>
		                    	<li class="instagram"><a href="<?php echo $instagramURL; ?>"><i class="fa fa-instagram"></i></a></li>
		                    <?php } ?>
		                </ul>
		                <?php } ?>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>