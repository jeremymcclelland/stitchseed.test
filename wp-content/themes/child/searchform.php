<?php
/**
 * The template for displaying search forms
 *
 */
?>



<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				
	<div class="input-group">
          	<input type="search" class="form-control search-field" placeholder="Search..." name="s" title="<?php _ex( 'Search for:', 'label', '_tk' ); ?>">

      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div><!-- /input-group -->

</form>
