<?php
/*
Template Name: Menu Page
*/
?>
<?php get_header(); ?>
<?php
	if (have_posts()) : while (have_posts()) : the_post();
?>
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
								$price = types_render_field( "menu-item-price", array( "raw"=>"true" ) );
						?>
						<div class="menu-card__item">
							<p class="item-title"><?php the_title(); ?><span class="price"><?php echo $price; ?></span></p>
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
								$price = types_render_field( "menu-item-price", array( "raw"=>"true" ) );
						?>
						<div class="menu-card__item">
							<p class="item-title"><?php the_title(); ?><span class="price"><?php echo $price; ?></span></p>
							<div class="item-content" data-mh="menu-items">
								<?php the_content(); ?>
							</div>
						</div>
					<?php
						endwhile;
						wp_reset_postdata();
					?>
					</div>
					<h1 class="menu-card__title">Add Ons<br><small><em>- $1 each -</em></small></h1>
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
						<?php $i += 0.5; ?>
					<?php
						endwhile;
						wp_reset_postdata();
					?>
					</div>
					<div class="row">
						<div class="col-md-6">
							<h1 class="menu-card__title">Drinks</h1>
							<?php
								$args = array(
									'post_type' 		=> 'menu-item',
									'tax_query' => array(
										array(
											'taxonomy'  => 'menu-category',
											'field'     => 'slug',
											'terms'		=> 'drinks',
										),
									),
									'orderby'			=> 'ID',
									'order'				=> 'ASC'
								);
								$loop = new WP_Query( $args );
									while ( $loop->have_posts() ) : $loop->the_post();
									$price = types_render_field( "menu-item-price", array( "raw"=>"true" ) );
							?>
							<div class="menu-card__item full">
								<p class="item-title"><?php the_title(); ?><span class="price"><?php echo $price; ?></span></p>
							</div>
							<?php
								endwhile;
								wp_reset_postdata();
							?>
						</div>
						<div class="col-md-6">
							<h1 class="menu-card__title">Sides</h1>
							<?php
								$args = array(
									'post_type' 		=> 'menu-item',
									'tax_query' => array(
										array(
											'taxonomy'  => 'menu-category',
											'field'     => 'slug',
											'terms'		=> 'side',
										),
									),
									'orderby'			=> 'ID',
									'order'				=> 'ASC'
								);
								$loop = new WP_Query( $args );
									while ( $loop->have_posts() ) : $loop->the_post();
									$price = types_render_field( "menu-item-price", array( "raw"=>"true" ) );
							?>
							<div class="menu-card__item full">
								<p class="item-title"><?php the_title(); ?><span class="price"><?php echo $price; ?></span></p>
							</div>
							<?php
								endwhile;
								wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>