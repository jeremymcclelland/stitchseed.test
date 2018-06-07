<?php
/**
 * Template Name: Template - Flex
 *
 *
 */

get_header(); 

?>
<?php //get_sidebar('general-page-header');  ?>

<?php if(get_the_content()){ ?>


<div class="main-content-full-width">

	<div class="container">
		<div class="row">

			<div id="content" class="main-content-inner col-sm-12">

				<?php while ( have_posts() ) : the_post(); ?>
			
					<?php //get_template_part( 'content', 'full-width-page' ); ?>
			
				<?php endwhile; // end of the loop. ?>

			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->
<?php } ?>


<?
include(get_stylesheet_directory().'/class.flex_content.php');
	


$page_id = get_the_ID();

$flex_content_builder = new flex_content_builder($page_id);


echo $flex_content_builder->get_section_content_html();

?>




<?php get_footer(); ?>
