<?php
/**
 * @package Dag
 */
?>

<!DOCTYPE html>
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php header('X-UA-Compatible: IE=edge,chrome=1'); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body>

<div id="wrap">

<div id="header">

	<div class="bloginfo">

		<div class="icon">
		<a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('template_url'); ?>/images/avatar.png" alt=""></a>
		</div>

		<div class="title">
		<a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
		</div>

	</div>

	<div class="menu">
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
	</div>

</div><!-- #header -->