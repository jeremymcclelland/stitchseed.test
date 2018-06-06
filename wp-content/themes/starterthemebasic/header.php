<!DOCTYPE html>
<html lang="en-US">

	<head>
		<!--[if lt IE 10]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <![endif]-->

		<?php // Basic meta data ?>
		<meta charset="utf-8">
		<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

		<?php // Mobile meta data ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="format-detection" content="telephone=yes">

		<?php // Page meta data ?>
		<meta name="author" content="<?php wp_title(''); ?>">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="keywords" content="key, words, listed, here">

		<?php // Basic link data ?>
		<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'sandbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php // Title ?>
		<title><?= esc_html( get_bloginfo('name'), 1 ); wp_title( '-', true, 'left' ); ?></title>

		<?php // Font includes ?>
		

		<?php wp_head(); ?>

	</head>

	<body>

		<div id="root">


			<header id="header">

				<?php // wp_nav_menu(); ?>

				<div><?php // echo file_get_contents( THEME_DIR .'/assets/svg/est.svg'); ?></div>

			</header>


			<div id="content">
