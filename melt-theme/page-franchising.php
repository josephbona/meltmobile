<?php
/*
Template Name: Franchising Page
*/
?>
<?php get_header(); ?>
<?php
	if (have_posts()) : while (have_posts()) : the_post();
	// banner
	$banner_image  				= types_render_field( "banner-image", array( "raw"=>"true" ) );
	$banner_title  				= types_render_field( "banner-title", array( "raw"=>"true" ) );
	// page subtitle
	$subtitle   				= types_render_field( "page-subtitle", array( "raw"=>"true" ) );
	// page image
	$image 						= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<section id="masthead" class="page-header" role="banner">
	<a class="skip-link screen-reader-text" href="#content" data-backstretch="<?php echo $banner_image; ?>">Skip to content</a>
	<div class="site-branding">
		<h1 class="entry-title"><?php echo $banner_title; ?></h1>
		<ul class="breadcrumb-arrows">
			<li <?php echo(is_page(26) ? 'class="active"' : ''); ?>>
				<a href="<?php echo get_page_link(26); ?>"><span class="count">1</span>A Cheesy Proposition</a>
			</li>
			<li <?php echo(is_page(29) ? 'class="active"' : ''); ?>>
				<a href="<?php echo get_page_link(29); ?>"><span class="count">2</span>Franchise Support</a>
			</li>
			<li <?php echo(is_page(31) ? 'class="active"' : ''); ?>>
				<a href="<?php echo get_page_link(31); ?>"><span class="count">3</span>Get Started</a>
			</li>
		</ul>
	</div>
</section>
<section id="content" class="main-content page-about">
	<div class="container">
		<div class="entry-content">
			<div class="row section">
				<div class="col-md-10 col-md-offset-1">
					<h2 class="heading text-center">Own A Franchise</h2>
					<h2 class="subheading text-center"><?php echo $subtitle; ?></h2>
					<div class="line text-center"></div>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>