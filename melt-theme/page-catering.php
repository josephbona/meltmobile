<?php
/*
Template Name: Catering Page
*/
?>
<?php get_header(); ?>
<?php
	if (have_posts()) : while (have_posts()) : the_post();
	// banner
	$banner_image  				= types_render_field( "banner-image", array( "raw"=>"true" ) );
	$banner_title  				= types_render_field( "banner-title", array( "raw"=>"true" ) );
	$banner_subtitle  			= types_render_field( "banner-subtitle", array( "raw"=>"true" ) );
	// page subtitle
	$subtitle   				= types_render_field( "page-subtitle", array( "raw"=>"true" ) );
	// page image
	$image 						= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<section id="masthead" class="page-header" role="banner">
	<a class="skip-link screen-reader-text" href="#content" data-backstretch="<?php echo $banner_image; ?>">Skip to content</a>
	<div class="site-branding">
		<h1 class="entry-title"><?php echo $banner_title; ?></h1>
		<h2 class="entry-subtitle"><?php echo $banner_subtitle; ?></h2>
	</div>
</section>
<section id="content" class="main-content page-about">
	<div class="container">
		<div class="entry-content">
			<div class="row section">
				<div class="col-md-7">
					<h2 class="heading"><?php the_title(); ?></h2>
					<h2 class="subheading"><?php echo $subtitle; ?></h2>
					<div class="line"></div>
					<?php the_content(); ?>
				</div>
				<div class="col-md-4 col-md-offset-1">
					<br><br>
					<?php if ($image && $image != '') { ?>
						<img class="img-responsive skew frame" src="<?php echo $image; ?>" alt="">
					<?php } ?>
				</div>
				<div class="col-md-8 col-md-offset-2">
					<br><br>
					<div class="line text-center"></div>
					<h3 class="text-center">Want More Info?</h3>
					<p class="text-center">Find your local truck and fill out the form on the catering page to get started.</p>
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4">
							<a href="<?php echo get_page_link(24); ?>" class="btn btn-block btn-lg btn-warning">Find Your Local Truck</a>
						</div>
					</div>
					<br><br>
					<div class="line text-center"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>