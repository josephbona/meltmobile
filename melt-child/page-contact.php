<?php
/*
Template Name: Contact Page
*/
?>
<?php get_header(); ?>
<?php
	if (have_posts()) : while (have_posts()) : the_post();
	$blog_id 			= get_current_blog_id();
	$blog_details 		= get_blog_details($blog_id);
	$sitename 			= $blog_details->blogname;
	$facebookURL 		= get_theme_mod('melt_facebook');
	$twitterURL 		= get_theme_mod('melt_twitter');
	$gplusURL 			= get_theme_mod('melt_gplus');
	$instagramURL 		= get_theme_mod('melt_instagram');
	// page subtitle
	$subtitle   				= types_render_field( "page-subtitle", array( "raw"=>"true" ) );

	date_default_timezone_set('America/New_York');
	$end_datetime = get_option('melt-checkin-end-datetime');
	$d1 = date('Y-m-d H:i:s', strtotime($end_datetime));
	$d1 = new DateTime($d1);
	$d2 = date('Y-m-d H:i:s');
	$d2 = new DateTime($d2);
	$checkin_active = ($d1 > $d2);
?>
<?php if($checkin_active){ ?>
<div class="contact-map" id="map"></div>
<?php } ?>
<section id="content" class="main-content page-about">
	<div class="container">
		<div class="entry-content">
			<div class="row section">
				<div class="col-md-8">
					<h2 class="heading"><?php the_title(); ?></h2>
					<h2 class="subheading"><?php echo $subtitle; ?></h2>
					<div class="line"></div>
					<?php the_content(); ?>
					<?php include (TEMPLATEPATH . '/inc/contact-form.php'); ?>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<div class="location-info">
						<h4><i class="fa fa-map-marker"></i> Current Location:</h4>
						<?php if($checkin_active){ ?>
						<p><?php echo get_option('melt-street-address'); ?><br><?php echo get_option('melt-city'); ?>, <?php echo get_option('melt-state'); ?> <?php echo get_option('melt-zipcode'); ?></p>
						<?php } else {?>
						<p>We're not on the move right now.</p>
						<?php } ?>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGXHuSoF-nSV3vVu5DDCS7ySl-_NwwiV0&callback=initMap" async defer></script>
<script>
	function initMap() {
		var myLatLng = {lat: <?php echo get_option('melt-checkin-lat') ?>, lng: <?php echo get_option('melt-checkin-long') ?>};
		var map = new google.maps.Map(document.getElementById('map'), {
		  scrollwheel: false,
		  center: myLatLng,
		  zoom: 14
		});
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: '<?php echo $sitename; ?>',
			icon: '<?php bloginfo('template_directory'); ?>/images/truck-marker.png'
		});
		var contentString = '<div id="content">'+
			'<p class="title full-width"><strong>'+
			'<?php echo $sitename; ?>'+
			'</strong></p>'+
			'<div class="address"><p class="address-line full-width">'+
			'<?php echo get_option('melt-street-address'); ?>'+
			'<br>' +
			'<?php echo get_option('melt-city'); ?>, <?php echo get_option('melt-state'); ?> <?php echo get_option('melt-zipcode'); ?>'+
			'</p></div>'+
			'<div class="view-link"><a href="https://maps.google.com/maps?ll='+<?php echo get_option('melt-checkin-lat') ?>+','+<?php echo get_option('melt-checkin-long') ?>+'&amp;q=loc:'+<?php echo get_option('melt-checkin-lat') ?>+'+'+<?php echo get_option('melt-checkin-long') ?>+'&amp;z=14&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" target="_blank">'+
			'View on Google Maps'+
			'</a></div></div>';
		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});
		marker.addListener('click', function() {
			infowindow.open(map, marker);
		});
		infowindow.open(map,marker);
	}
</script>
<?php endwhile; endif; ?>
<?php get_footer(); ?>