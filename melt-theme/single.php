<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section id="content" class="main-content page-about">
	<div class="container">
		<div class="entry-content">
			<div class="row section">
				<div class="col-md-8">
					<h2 class="heading">Posted on <?php the_time('F jS, Y'); ?></h2>
					<h2 class="subheading"><?php the_title(); ?></h2>
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