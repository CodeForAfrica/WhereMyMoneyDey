<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Where My Money Dey?
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<link rel="stylesheet" type="text/css" href="wp-content/themes/where_my_money_dey/dropdown/css/style.css" />

<script type="text/javascript" src="wp-content/themes/where_my_money_dey/dropdown/js/modernizr.custom.79639.js"></script> 
<noscript><link rel="stylesheet" type="text/css" href="wp-content/themes/where_my_money_dey/dropdown/css/noJS.css" /></noscript>

<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5/leaflet.css" />
<!--[if lte IE 8]>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5/leaflet.ie.css" />
<![endif]-->

<script src="http://cdn.leafletjs.com/leaflet-0.5/leaflet.js"></script>
<script src="wp-content/themes/where_my_money_dey/mapthingy/ajax_request.js"></script>


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="map-canvas">
		<div id="map">
			<?php include "wp-content/themes/where_my_money_dey/mapthingy/map.php"; ?>
		</div>
	</div>
	<div id="page-wrap" class="hfeed site">
		<div id="page-container">
		<?php do_action( 'before' ); ?>
			<header id="masthead" class="site-header" role="banner">
				<div id="header-logo">
					<div>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="wp-content/themes/where_my_money_dey/images/wmmd-logo1.png" class="header-image" /></a>
					</div>
				</div>
			</header><!-- #masthead -->

			<div id="main" class="site-main">
