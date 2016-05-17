<footer id="footer" class="site-footer">
	<div class="text-center">
		<?php
		if (have_posts()) : while (have_posts()) : the_post();
		$blog_id 			= get_current_blog_id();
		$blog_details 		= get_blog_details($blog_id);
		$sitename 			= $blog_details->blogname;
		?>
		<h4 style="color: white;"><?php echo $sitename; ?></h4>
		<?php endwhile; endif; ?>
		<p style="font-weight: 600; font-size: 22px; color: #FDF4C2;"><i class="fa fa-phone"></i> <?php echo get_theme_mod('melt_phone_number') ?></p>
		<a href="<?php echo network_home_url('/'); ?>find-a-truck/" class="btn btn-warning btn-lg"><i class="fa fa-map-marker"></i> Find Another Truck</a>
	</div>
</footer>
<div class="copyright">
	&copy; <?php echo date("Y") ?> Melt Mobile
</div>
</div><!-- /st-content-inner -->
</div><!-- /st-content -->
</div><!-- /st-pusher -->
</div><!-- /st-container -->
<!-- Core JavaScript
================================================== -->
<script src="<?php bloginfo('template_directory'); ?>/js/script.min.js"></script>

<?php wp_footer(); ?>

</body>
</html>