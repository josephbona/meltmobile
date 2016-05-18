<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<?php
	if (have_posts()) : while (have_posts()) : the_post();
	// homepage banner
	$banner_img_desktop				= types_render_field( "homepage-banner-desktop-image", array( "raw"=>"true" ) );
	$banner_img_mobile 				= types_render_field( "homepage-banner-mobile-image", array( "raw"=>"true" ) );
	// welcome block
	$welcome_title1   				= types_render_field( "welcome-block-title-line-1", array( "raw"=>"true" ) );
	$welcome_title2   				= types_render_field( "welcome-block-title-line-2", array( "raw"=>"true" ) );
	$welcome_content   				= types_render_field( "welcome-block-content", array( "raw"=>"true" ) );
	// menu block
	$menu_title1   					= types_render_field( "menu-block-title-line-1", array( "raw"=>"true" ) );
	$menu_title2   					= types_render_field( "menu-block-title-line-2", array( "raw"=>"true" ) );
	$menu_content   				= types_render_field( "menu-block-content", array( "raw"=>"true" ) );
	$menu_image   					= types_render_field( "menu-block-image", array( "raw"=>"true" ) );
	// catering block
	$catering_title1   				= types_render_field( "catering-block-title-line-1", array( "raw"=>"true" ) );
	$catering_title2   				= types_render_field( "catering-block-title-line-2", array( "raw"=>"true" ) );
	$catering_content   			= types_render_field( "catering-block-content", array( "raw"=>"true" ) );
	$catering_image   				= types_render_field( "catering-block-image", array( "raw"=>"true" ) );
	// food-network block
	$food_network_title1   			= types_render_field( "food-network-block-title-line-1", array( "raw"=>"true" ) );
	$food_network_title2   			= types_render_field( "food-network-block-title-line-2", array( "raw"=>"true" ) );
	$food_network_content   		= types_render_field( "food-network-block-content", array( "raw"=>"true" ) );
	$food_network_video_url   		= types_render_field( "food-network-block-video-url", array( "raw"=>"true" ) );
	$food_network_image		   		= types_render_field( "food-network-block-image", array( "raw"=>"true" ) );
?>
<section class="board">
	<img class="hidden-xs" src="<?php echo $banner_img_desktop; ?>" alt="">
	<img class="hidden-sm hidden-md hidden-lg" src="<?php echo $banner_img_mobile; ?>" alt="">
</section>
<section class="section-home section-home__intro">
	<div class="section-home__box">
		<h2 class="heading wow fadeIn"><?php echo $welcome_title1; ?></h2>
		<h2 class="subheading wow fadeIn"><?php echo $welcome_title2; ?></h2>
		<div class="line wow fadeIn text-center"></div>
		<?php echo $welcome_content; ?>
	</div>
</section>
<section class="section-home section-home--inverse">
	<div class="row no-gutter section-home--mobile">
		<div class="col-md-4 wow fadeInanimated section-home__image" style="background-image: url('<?php echo $menu_image; ?>');"></div>
		<div class="section-home__block col-md-8 wow fadeIn">
			<div class="section-home__box">
				<h2 class="heading"><?php echo $menu_title1; ?></h2>
				<h2 class="subheading"><?php echo $menu_title2; ?></h2>
				<div class="line"></div>
				<?php echo $menu_content; ?>
			</div>
		</div>
	</div>
	<div class="row no-gutter section-home--desktop">
		<div class="col-md-5 wow fadeInLeft section-home__image" data-mh="section-home-one" style="background-image: url('<?php echo $menu_image; ?>');"></div>
		<div class="section-home__block col-md-7 wow fadeInRight" data-mh="section-home-one">
			<div class="section-home__box">
				<h2 class="heading"><?php echo $menu_title1; ?></h2>
				<h2 class="subheading"><?php echo $menu_title2; ?></h2>
				<div class="line"></div>
				<?php echo $menu_content; ?>
			</div>
		</div>
	</div>
</section>
<section class="section-home">
	<div class="row no-gutter section-home--mobile">
		<div class="col-md-4 wow fadeInanimated section-home__image" style="background-image: url('<?php echo $catering_image; ?>');"></div>
		<div class="section-home__block col-md-8 wow fadeIn">
			<div class="section-home__box">
				<h2 class="heading"><?php echo $catering_title1; ?></h2>
				<h2 class="subheading"><?php echo $catering_title2; ?></h2>
				<div class="line"></div>
				<?php echo $catering_content; ?>
			</div>
		</div>
	</div>
	<div class="row no-gutter section-home--desktop">
		<div class="section-home__block col-md-7 wow fadeInLeft" data-mh="section-home-one">
			<div class="section-home__box">
				<h2 class="heading"><?php echo $catering_title1; ?></h2>
				<h2 class="subheading"><?php echo $catering_title2; ?></h2>
				<div class="line"></div>
				<?php echo $catering_content; ?>
			</div>
		</div>
		<div class="col-md-5 wow fadeInRight section-home__image" data-mh="section-home-one" style="background-image: url('<?php echo $catering_image; ?>');"></div>
	</div>
</section>
<section class="section-home section-home--inverse">
	<div class="row no-gutter section-home--mobile">
		<div class="col-md-4 wow fadeInanimated section-home__image" data-mh="section-home-one" style="background-image: url('<?php echo $food_network_image; ?>');">
			<!-- <div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" width="640" height="388" src="<?php echo $food_network_video_url; ?>" frameborder="0" allowfullscreen=""></iframe>
			</div> -->
		</div>
		<div class="section-home__block col-md-8 wow fadeIn">
			<div class="section-home__box">
				<h2 class="heading"><?php echo $food_network_title1; ?></h2>
				<h2 class="subheading"><?php echo $food_network_title2; ?></h2>
				<div class="line"></div>
				<?php echo $food_network_content; ?>
			</div>
		</div>
	</div>
	<div class="row no-gutter section-home--desktop">
		<div class="col-md-5 wow fadeInLeft section-home__image" data-mh="section-home-one" style="background-image: url('<?php echo $food_network_image; ?>');">
			<!-- <div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" width="640" height="388" src="<?php echo $food_network_video_url; ?>" frameborder="0" allowfullscreen=""></iframe>
			</div> -->
		</div>
		<div class="section-home__block col-md-7 wow fadeInRight" data-mh="section-home-one">
			<div class="section-home__box">
				<h2 class="heading"><?php echo $food_network_title1; ?></h2>
				<h2 class="subheading"><?php echo $food_network_title2; ?></h2>
				<div class="line"></div>
				<?php echo $food_network_content; ?>
			</div>
		</div>
	</div>
</section>
<section class="collage">
	<div class="photos"></div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>