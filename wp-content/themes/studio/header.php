<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Studio
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">

		<header id="masthead" class="site-header" role="banner">
			<div id="headerContainer" ng-controller="headerCtrl">

				<div class="site-branding">
					<!-- <h1 class="site-title">{{leadershipOS.title}}</h1>
					<div class="site-subtitle">{{nothingButApps.title}}</div> -->
				</div><!-- .site-branding -->

				<a href="#sidr-main" class="menu-toggle icon">

				</a>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<!--<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>-->
					<div class="custom-site-header">
						Hardcoded header title
					</div>

				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
		</div>
		<div id="content" class="site-content">
