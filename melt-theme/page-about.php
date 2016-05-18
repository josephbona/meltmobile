<?php
/*
Template Name: About Page
*/
?>
<?php get_header(); ?>
<?php
	if (have_posts()) : while (have_posts()) : the_post();
	$subtitle   				= types_render_field( "page-subtitle", array( "raw"=>"true" ) );
	$image 						= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<section class="hero">
	<div class="container">
		<div class="truck">
			<img src="<?php bloginfo('template_directory'); ?>/images/truck/body.png">
			<span class="wheel front"></span>
			<span class="wheel rear"></span>
		</div>
		<div class="them">
			<img class="diana" src="<?php bloginfo('template_directory'); ?>/images/them/diana.png" alt="">
			<img class="darlene" src="<?php bloginfo('template_directory'); ?>/images/them/darlene.png" alt="">
		</div>
		<div class="mobile-truck"><img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/mobile-truck.png"></div>
	</div>
	<div class="town"></div>
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
			</div>
		</div>
	</div>
	<div class="section section-quote">
		<div class="container">
			<div class="line text-center"></div>
			<blockquote>Whether you're an old school grilled cheese tomato soup dipper, <br>or you're feeling a little more adventurous, it's all good. <br><strong>All that matters is that you Take It Cheesy...</strong></blockquote>
			<div class="line text-center"></div>
		</div>
	</div>
	<!-- <div class="container">
		<div class="entry-content">
			<div class="row section">
				<div class="col-md-5">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" width="640" height="388" src="http://www.foodnetwork.com/videos/more-on-melt-mobile-0192673.embed.html" frameborder="0" allowfullscreen=""></iframe>
					</div>
				</div>
				<div class="col-md-6 col-md-offset-1">
					<h2 class="heading">featured on food network</h2>
					<h2 class="subheading">Melt Mobile appeared on Food Network's "3 Days to Open"</h2>
					<div class="line"></div>
					<p>In season 1 of "3 Days to Open" Melt Mobile invited super-star chef Bobby Flay to help launch the first food truck. We've come a long way since then!</p>
				</div>
			</div>
		</div>
	</div> -->
	<div class="container">
		<div class="entry-content">
			<div class="row section">
				<div class="col-md-6 text-center">
					<img src="<?php bloginfo('template_directory'); ?>/images/umbrella.png" alt="" class="img-responsive m-a">
					<br>
					<h2 class="heading">2% percent of our proceeds go to the Umbrella Club</h2>
					<p>A local charitable organization devoted to helping underprivileged children in need.</p>
				</div>
				<div class="col-md-6 text-center">
					<img src="<?php bloginfo('template_directory'); ?>/images/bestof.png" alt="" class="img-responsive m-a">
					<br>
					<h2 class="heading">Voted the Number One Food Truck!</h2>
					<p>Melt Mobile has been voted the best food truck in Connecticut <br class="passive-break">3 years running.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>