<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"> <!-- NO SEO - REMOVE BEFORE GOING LIVE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site CSS -->
    <link type='text/css' rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/main.css">

	<script src="https://use.typekit.net/eoi7xns.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=722188141178104";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="st-container" class="st-container">
    <nav class="st-menu st-effect-4" id="menu-4">
        <h2>Main Navigation</h2>
        <?php include (TEMPLATEPATH . '/inc/navigation.php'); ?>
    </nav>
<div class="st-pusher">
<div class="st-content"><!-- this is the wrapper for the content -->
<div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
<header class="site-header">
	<div class="container-fluid">
		<div class="mobile-clearfix">
			<a href="<?php echo network_home_url('/'); ?>" class="logo"><img src="<?php bloginfo('template_directory'); ?>/images/logo1.png" alt="Melt Mobile Food Truck"></a>
			<div id="st-trigger-effects" class="column">
				<button type="button" class="navbar-toggle collapsed" data-effect="st-effect-4">
			        <i class="fa fa-bars"></i>
			    </button>
		    </div>
		</div>
		<nav class="site-navigation">
			<div class="collapse navbar-collapse">
				<?php include (TEMPLATEPATH . '/inc/navigation.php'); ?>
			</div>
		</nav>
	</div>
</header>