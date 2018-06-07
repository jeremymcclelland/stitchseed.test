<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package _tk
 */

get_header(); ?>

<div class="main-content">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner XXcol-sm-12 XXcol-md-8">


	<?php if ( have_posts() ) : ?>
		
		<div class="col-md-12">
			<header>
				<h2 class="page-title"><?php printf( __( 'Search Results for: %s', '_tk' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			</header><!-- .page-header -->
		</div>
		<?php // start the loop. ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'grid' ); ?>

		<?php endwhile; ?>


	<?php else : ?>

		<?php get_template_part( 'no-results', 'search' ); ?>

	<?php endif; // end of loop. ?>

<?php //get_sidebar(); ?>

			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
		
		<div class="row">
			<div class="col-md-12"><?php _tk_pagination(); ?></div>
		</div>

	</div><!-- close .container -->
</div><!-- close .main-content -->
<?php get_footer(); ?>