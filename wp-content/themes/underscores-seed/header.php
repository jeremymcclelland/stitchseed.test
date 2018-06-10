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


			<form role="search" method="get" id="search-form-drawer" class="search-form-drawer search-hide" action="<?php echo esc_url( home_url( '/' ) ); ?>">

					<button type="submit" class="search-submit"><?php echo file_get_contents(get_template_directory().'/images/search.svg'); ?></button>

					<input type="search" class="search-field" placeholder="Type here" value="" name="s" title="Search for:">
					<a class="search-close" onclick="closeSearch()"><span><?php echo file_get_contents(get_template_directory().'/images/close.svg'); ?></span></a>
			</form>





		<nav id="site-navigation" class="main-navigation">
			

			<div class="flex-wrapper">
				<div class="left-nav flex-item">

					<ul>
						<li class="social">
							<a href="#"><?php echo file_get_contents(get_template_directory().'/images/instagram.svg'); ?></a>

							<a href="#"><?php echo file_get_contents(get_template_directory().'/images/facebook.svg'); ?></a>
						</li>
						
						<?php
				
						$left_menu = wp_nav_menu( array(
							'echo' => false,
							'theme_location' => 'main-left',
							'menu_id'        => 'main-left',
							'container'		 =>  false,
						) );

						echo preg_replace(array(
					        '#^<ul[^>]*>#',
					        '#</ul>$#'
					    ), '', $left_menu);


						?>


					</ul>
				</div>

				<div class="flex-item flex-logo">
					<a class="header-logo" href="/">
						<!-- <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/images/284WeddingsandEvents.svg"/> -->
						<?php echo file_get_contents(get_template_directory().'/images/284WeddingsandEvents.svg'); ?>
					</a>
				</div>

				<div class="right-nav flex-item">
 					<ul>
						<?php
				
						$right_menu = wp_nav_menu( array(
							'echo' => false,
							'theme_location' => 'main-right',
							'menu_id'        => 'main-right',
							'container'		 =>  false,
						) );

						echo preg_replace(array(
					        '#^<ul[^>]*>#',
					        '#</ul>$#'
					    ), '', $right_menu);


						?>
						<li><a class="search-icon" onclick="openSearch()"><?php echo file_get_contents(get_template_directory().'/images/search.svg'); ?></a></li>
					</ul>
				</div>


				<a class="expand-icon" onclick="openNav()">&#9776;</a>
			</div>




		</nav><!-- #site-navigation -->




<div id="navOverlay" class="overlay overlay-hide">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><?php echo file_get_contents(get_template_directory().'/images/close.svg'); ?></a>
  <ul class="overlay-content">

  		<?php
			
			$left_menu = wp_nav_menu( array(
				'echo' => false,
				'theme_location' => 'main-left',
				'menu_id'        => 'main-left',
				'container'		 =>  false,
			) );
			echo preg_replace(array(
			       '#^<ul[^>]*>#',
			       '#</ul>$#'
			   ), '', $left_menu);
		?>

  		<?php
			
			$right_menu = wp_nav_menu( array(
				'echo' => false,
				'theme_location' => 'main-right',
				'menu_id'        => 'main-right',
				'container'		 =>  false,
			) );
			echo preg_replace(array(
			       '#^<ul[^>]*>#',
			       '#</ul>$#'
			   ), '', $right_menu);
		?>
  </div>
</div>






<script>
function openNav() {
    jQuery("#navOverlay").addClass('overlay-display').removeClass('overlay-hide');
    //jQuery("html").css('overflow', 'hidden');
}

function closeNav() {
    jQuery("#navOverlay").addClass('overlay-hide').removeClass('overlay-display');
    //jQuery("html").css('overflow', 'scroll');
}

function openSearch() {
    jQuery("#search-form-drawer").addClass('search-display').removeClass('search-hide');
}

function closeSearch() {
    jQuery("#search-form-drawer").addClass('search-hide').removeClass('search-display');
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

