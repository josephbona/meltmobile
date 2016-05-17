<?php
/*
Template Name: Contact Page
*/
?>
<?php get_header(); ?>
<?php
	if (have_posts()) : while (have_posts()) : the_post();
	$facebookURL 		= get_theme_mod('melt_facebook');
	$twitterURL 		= get_theme_mod('melt_twitter');
	$gplusURL 			= get_theme_mod('melt_gplus');
	$instagramURL 		= get_theme_mod('melt_instagram');
?>
<section id="content" class="main-content page-about">
	<div class="container">
		<div class="entry-content">
			<h1 class="text-center"><?php the_title(); ?></h1>
			<div class="row section">
				<div class="col-md-9">
					<div class="panel panel-default">
						<div class="panel-body">
							<div id="map" class="embed-responsive embed-responsive-16by9">

							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="location-info">
						<h4><i class="fa fa-map-marker"></i> Current Location:</h4>
						<p><?php echo get_option('melt-street-address'); ?><br><?php echo get_option('melt-city'); ?>, <?php echo get_option('melt-state'); ?> <?php echo get_option('melt-zipcode'); ?></p>
						<h4><i class="fa fa-phone"></i> Phone Number:</h4>
						<p><?php echo get_theme_mod('melt_phone_number') ?></p>
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
		                <p></p>
		                <h4>Stay Updated</h4>
		                <p style="line-height:1; font-size:16px;"><small>Sign up for our newsletter to recieve the latest news and specials!</small></p>
		                <?php include (TEMPLATEPATH . '/inc/subscribe-form.php'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGXHuSoF-nSV3vVu5DDCS7ySl-_NwwiV0&callback=initMap" async defer></script>
<script>
	function initMap() {
		var myLatLng = {lat: <?php echo get_option('melt-checkin-lat') ?>, lng: <?php echo get_option('melt-checkin-long') ?>};
		var map = new google.maps.Map(document.getElementById('map'), {
		  center: myLatLng,
		  zoom: 14
		});
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: '<?php echo get_option('melt-street-address'); ?><br><?php echo get_option('melt-city'); ?>, <?php echo get_option('melt-state'); ?> <?php echo get_option('melt-zipcode'); ?>'
		});
	}
</script>
<?php get_footer(); ?>