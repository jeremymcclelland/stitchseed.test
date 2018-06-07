<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UnderscoresSeed
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'underscores-seed' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding hidden">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$underscores_seed_description = get_bloginfo( 'description', 'display' );
			if ( $underscores_seed_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $underscores_seed_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		


		<div class="search-drawer-wrapper">
			<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', '_tk' ); ?>">
					<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', '_tk' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', '_tk' ); ?>">
			</form>
		</div>



		<nav id="site-navigation" class="main-navigation">
			

			<div class="flex-wrapper">

				<div class="left-nav flex-item">
					<ul>
						<li class="social">
							<a href="#"><img class="social-icon svg" src="<?php echo get_stylesheet_directory_uri(); ?>/images/instagram.svg"/></a>
							<a href="#"><img class="social-icon svg" src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.svg"/></a>
						</li>
						<li><a href="#">Portfolio</a></li>
						<li><a href="#">About</a></li>
					</ul>
				</div>

				<div class="flex-item flex-logo">
					<a class="header-logo" href="/">
						<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/images/284WeddingsandEvents.svg"/>
					</a>
				</div>

				<div class="right-nav flex-item">
 					<ul>
						<li><a href="#">Musings</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#"><img class="social-icon svg" src="<?php echo get_stylesheet_directory_uri(); ?>/images/search.svg"/></a></li>
					</ul>
				</div>

				<button class="menu-toggle hidden" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'underscores-seed' ); ?></button>
				<?php
				// wp_nav_menu( array(
				// 	'theme_location' => 'menu-1',
				// 	'menu_id'        => 'primary-menu',
				// ) );
				?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content container">

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', '_tk' ); ?>">
			<label>
			<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', '_tk' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', '_tk' ); ?>">
			</label>
</form>

