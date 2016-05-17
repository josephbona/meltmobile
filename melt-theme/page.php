<?php get_header(); ?>
<?php
	if (have_posts()) : while (have_posts()) : the_post();
	// page subtitle
	$subtitle   				= types_render_field( "page-subtitle", array( "raw"=>"true" ) );
?>
<section id="content" class="main-content page-about">
	<div class="container">
		<div class="entry-content">
			<div class="row section">
				<div class="col-md-8">
					<h2 class="heading"><?php the_title(); ?></h2>
					<h2 class="subheading"><?php echo $subtitle; ?></h2>
					<div class="line"></div>
					<?php the_content(); ?>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>