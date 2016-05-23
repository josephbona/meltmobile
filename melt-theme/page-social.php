<?php
/*
Template Name: Say Cheeze Page
*/
?>
<?php get_header(); ?>
<?php
	if (have_posts()) : while (have_posts()) : the_post();
	// banner
	$banner_image  				= types_render_field( "banner-image", array( "raw"=>"true" ) );
	$banner_title  				= types_render_field( "banner-title", array( "raw"=>"true" ) );
	$banner_subtitle  			= types_render_field( "banner-subtitle", array( "raw"=>"true" ) );
?>
<section id="masthead" class="page-header" role="banner">
	<a class="skip-link screen-reader-text" href="#content" data-backstretch="<?php echo $banner_image; ?>">Skip to content</a>
	<div class="site-branding">
		<h1 class="entry-title"><?php echo $banner_title; ?></h1>
		<h2 class="entry-subtitle"><?php echo $banner_subtitle; ?></h2>
	</div>
</section>
<section class="social-buzz" id="content">
	<div class="container">
		<div id="grid" data-columns>
		<?php
			$args = array(
				'post_type' 		=> 'post',
				'orderby'			=> 'ID',
				'order'				=> 'DESC'
			);
			$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
		?>
			<?php if ( has_post_format( 'status' )) { ?>
				<div class="post-status">
					<?php the_content(); ?>
				</div>
			<?php } else { ?>
				<?php $excerpt = get_the_excerpt() ?> 
				<div class="post-standard">
					<h2 class="post-title"><?php the_title(); ?></h2>
					<div class="post-date">Posted on <?php the_time('F jS, Y'); ?></div>
					<?php if (has_post_thumbnail()) { ?>
						<!-- get featured image -->
						<?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
						<!-- display featured image -->
						<div class="featured-image">
							<a href="<?php the_permalink() ?>">
								<img class="img-responsive margin-auto" src="<?php echo $featured_image; ?>" alt="<?php $thumb_id = get_post_thumbnail_id(get_the_ID()); $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true); if(count($alt)) echo $alt; ?>" />
							</a>
						</div>
					<?php } ?>
					<div class="post-excerpt">
						<?php echo $excerpt; ?>
					</div>
					<a class="btn btn-block btn-warning btn-sm read-more" href="<?php the_permalink() ?>">Continue Reading <i class="fa fa-chevron-right"></i></a>
				</div>
			<?php } ?>
		<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>