<?php
/*
Template Name: About Page
*/
?>
<?php get_header(); ?>
<?php
	if (have_posts()) : while (have_posts()) : the_post();
	// page subtitle
	$subtitle   				= types_render_field( "page-subtitle", array( "raw"=>"true" ) );
	$image 				= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<section id="content" class="main-content page-about">
	<div class="container">
		<div class="entry-content">
			<div class="row section">
			<?php if ($image && $image != '') { ?>
				<div class="col-md-7">
					<h2 class="heading"><?php the_title(); ?></h2>
					<h2 class="subheading"><?php echo $subtitle; ?></h2>
					<div class="line"></div>
					<?php the_content(); ?>
				</div>
				<div class="col-md-4 col-md-offset-1">
					<br><br>
					<img class="img-responsive skew frame" src="<?php echo $image; ?>" alt="">
				</div>
			</div>
			<?php } else { ?>
				<div class="col-md-12">
					<h2 class="heading"><?php the_title(); ?></h2>
					<h2 class="subheading"><?php echo $subtitle; ?></h2>
					<div class="line"></div>
					<?php the_content(); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>