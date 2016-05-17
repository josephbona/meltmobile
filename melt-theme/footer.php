<?php if(!is_page(24)) { ?>
<section id="footer" class="map-finder">
	<div class="finder-logo">
		<img src="<?php bloginfo('template_directory'); ?>/images/finder-logo1.png" alt="">
	</div>
	<div class="finder">
		<form action="<?php echo home_url(); ?>/find-a-truck/" method="get">
		<div class="finder-row">
			<div class="finder-icon">
				<i class="fa fa-map-marker"></i>
			</div>
			<div class="finder-input">
				<input class="form-control input-lg" name="zipcode" type="text" placeholder="Enter Zip Code &amp; Press Enter">
			</div>
		</div>
		</form>
	</div>
</section>
<?php } ?>
<footer class="site-footer">
	<h2>Stay In Touch</h2>
	<ul class="social-links">
        <li class="facebook"><a href="https://www.facebook.com/MeltMobile"><i class="fa fa-facebook"></i></a></li>
        <li class="twitter"><a href="https://twitter.com/melt_mobile"><i class="fa fa-twitter"></i></a></li>
        <li class="google-plus"><a href="https://www.google.com/maps/place/Melt+Mobile/@41.1501047,-74.6843955,8z/data=!3m1!4b1!4m5!3m4!1s0x89c2a4264680afdd:0x28fda8bdc0ad4dcb!8m2!3d41.1555399!4d-73.5632799"><i class="fa fa-google-plus"></i></a></li>
        <li class="yelp"><a href="http://www.yelp.com/biz/melt-mobile-stamford"><i class="fa fa-yelp"></i></a></li>
        <li class="instagram"><a href="https://www.instagram.com/meltmobile/"><i class="fa fa-instagram"></i></a></li>
    </ul>
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