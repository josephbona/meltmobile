<?php
/*
Template Name: Menu Page
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
		<!-- <h2 class="entry-subtitle"><?php echo $banner_subtitle; ?></h2> -->
	</div>
</section>
<section id="content" class="main-content about">
	<div class="container">
		<div class="entry-content">
			<div class="menu-card no-bg">
				<div class="menu-card__content">
					<h1 class="menu-card__title">Specialty Sandwiches</h1>
					<div class="row">
						<?php
							$args = array(
								'post_type' 		=> 'menu-item',
								'tax_query' => array(
									array(
										'taxonomy'  => 'menu-category',
										'field'     => 'slug',
										'terms'		=> 'sandwich',
									),
								),
								'orderby'			=> 'ID',
								'order'				=> 'ASC'
							);
							$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
						?>
						<div class="menu-card__item">
							<p class="item-title"><?php the_title(); ?></p>
							<div class="item-content" data-mh="menu-items">
								<?php the_content(); ?>
							</div>
						</div>
					<?php
						endwhile;
						wp_reset_postdata();
					?>
					</div>
					<h1 class="menu-card__title">Dessert Melts</h1>
					<div class="row">
						<?php
							$args = array(
								'post_type' 		=> 'menu-item',
								'tax_query' => array(
									array(
										'taxonomy'  => 'menu-category',
										'field'     => 'slug',
										'terms'		=> 'dessert-melt',
									),
								),
								'orderby'			=> 'ID',
								'order'				=> 'ASC'
							);
							$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();
						?>
						<div class="menu-card__item">
							<p class="item-title"><?php the_title(); ?></p>
							<div class="item-content" data-mh="menu-items">
								<?php the_content(); ?>
							</div>
						</div>
					<?php
						endwhile;
						wp_reset_postdata();
					?>
					</div>
					<h1 class="menu-card__title">Add Ons</h1>
					<div class="row">
						<?php
							$args = array(
								'post_type' 		=> 'menu-item',
								'tax_query' => array(
									array(
										'taxonomy'  => 'menu-category',
										'field'     => 'slug',
										'terms'		=> 'add-on',
									),
								),
								'orderby'			=> 'ID',
								'order'				=> 'ASC'
							);
							$loop = new WP_Query( $args );
							$i = 0;
								while ( $loop->have_posts() ) : $loop->the_post();
								$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						?>
						<div class="col-fifth wow fadeIn" data-wow-delay="<?php echo $i; ?>s">
							<div class="add-on">
								<?php if ($image && $image != '') { ?>
									<img src="<?php echo $image; ?>">
								<?php } ?>
							</div>
							<h4 class="add-on__title eh"><?php the_title(); ?></h4>
						</div>
						<?php $i += 0.25; ?>
					<?php
						endwhile;
						wp_reset_postdata();
					?>
					</div>
					<div class="corner topleft"></div>
					<div class="corner topright"></div>
					<div class="corner bottomleft"></div>
					<div class="corner bottomright"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>