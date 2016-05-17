<?php
/*
Template Name: Find A Truck Page
*/
?>
<?php get_header(); ?>
<?php
	if (have_posts()) : while (have_posts()) : the_post();
?>
<section id="content" class="main-content page-about" style="padding-top:0;">
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>