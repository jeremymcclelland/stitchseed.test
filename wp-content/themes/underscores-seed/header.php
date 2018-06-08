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


		<div class="search-drawer-wrapper">
			<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', '_tk' ); ?>">
					<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', '_tk' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', '_tk' ); ?>">
			</form>
		</div>




		<nav id="site-navigation" class="main-navigation">
			

			<div class="flex-wrapper">
				<a class="expand-icon" onclick="openNav()">&#9776;</a>
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

				<?php
				// wp_nav_menu( array(
				// 	'theme_location' => 'menu-1',
				// 	'menu_id'        => 'primary-menu',
				// ) );
				?>
			</div>
		</nav><!-- #site-navigation -->




<div id="navOverlay" class="overlay overlay-hide">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
  	<a href="#">Home</a>
    <a href="#">Portfolio</a>
    <a href="#">About</a>
    <a href="#">Musings</a>
    <a href="#">Contact</a>
  </div>
</div>






<script>
function openNav() {
    jQuery("#navOverlay").addClass('overlay-display').removeClass('overlay-hide');
}

function closeNav() {
    jQuery("#navOverlay").addClass('overlay-hide').removeClass('overlay-display');
}
</script>







	</header><!-- #masthead -->

	<div id="content" class="site-content container">

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', '_tk' ); ?>">
			<label>
			<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', '_tk' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', '_tk' ); ?>">
			</label>
</form>

