<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _tk
 */
?>
			
<a href="#" id="back-to-top" title="Back to top"><i class="fa fa-arrow-up"></i></a>
<footer id="colophon" class="site-footer" role="contentinfo">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container">
		<div class="row">
			<div class="site-footer-inner col-sm-12">

				<div class="site-info">
					<?php do_action( '_tk_credits' ); ?>
					Copyright &copy; <?php echo date("Y") . ' ' . get_bloginfo('name', ''); ?>
					<span class="sep"> | </span>
                    <a class="credits" rel="nofollow" href="https://www.thedesigngrouponline.com/" target="_blank" title="Themes and Plugins developed by The Design Group" alt="Themes and Plugins developed by The Design Group"><?php _e('Themes and Plugins developed by The Design Group.','_tk') ?> </a>
				</div><!-- close .site-info -->

			</div>
		</div>
	</div><!-- close .container -->
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>
