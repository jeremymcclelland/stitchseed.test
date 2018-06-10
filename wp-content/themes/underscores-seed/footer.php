<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UnderscoresSeed
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer hidden">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'underscores-seed' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'underscores-seed' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<a href="<?php echo esc_url( __( 'http://sdcopartners.com/', 'underscores-seed' ) ); ?>"><?php printf( esc_html__( 'underscores-seed Theme By: %s', 'underscores-seed' ), 'SDCO' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->


	<footer id="colophon" class="site-footer">
		<div class="flex-item">
			<p>Copyright <?php echo date("Y"); ?> 284 Weddings & Events</p>
		</div>

		<div class="flex-item foot-center">
			<p class="lead"><a href="tel: 617-934-2500">617 934 2500</a></p>
			<p><a href="/contact">Inquire</a></p>
		</div>

		<div class="flex-item foot-right">
			<p><a href="http://sdcopartners.com/" target="_blank">Site By SDCO Partners</a></p>
		</div>




	</footer><!-- #colophon -->



</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
