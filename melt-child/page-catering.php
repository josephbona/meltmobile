<?php
/*
Template Name: Catering Page
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
				<div class="col-md-8 col-md-offset-2">
					<br><br>
					<div class="line text-center"></div>
					<h3 class="text-center">Want More Info?</h3>
					<p class="text-center">Please fill out our catering form and we will provide you with further details.</p>
					<div class="menu-card">
						<div class="menu-card__content">
							<h1 class="menu-card__title">Catering &amp; Event Contact Form</h1>
							<?php include (TEMPLATEPATH . '/inc/catering-form.php'); ?>
						</div>
					</div>
				</div>
			</div>
			<?php } else { ?>
				<div class="col-md-12">
					<h2 class="heading"><?php the_title(); ?></h2>
					<h2 class="subheading"><?php echo $subtitle; ?></h2>
					<div class="line"></div>
					<?php the_content(); ?>
					<div class="line"></div>
				</div>
				<div class="col-md-8 col-md-offset-2">
					<br><br>
					<div class="line text-center"></div>
					<h3 class="text-center">Want More Info?</h3>
					<p class="text-center">Please fill out our catering form and we will provide you with further details.</p>
					<div class="menu-card">
						<div class="menu-card__content">
							<h1 class="menu-card__title">Catering &amp; Event Contact Form</h1>
							<?php include (TEMPLATEPATH . '/inc/catering-form.php'); ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>