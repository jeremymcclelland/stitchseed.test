<?php get_header(); ?>

<div class="scene" id="index">


	<?php if( have_posts() ) :?>

		<?php while ( have_posts() ) : the_post() ?>

			<div id="post-<?php the_ID(); ?>">
				
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php the_content(); ?>
				
			</div>

		<?php endwhile; ?>
		
		<?php // Pagination
		$prev_link = get_previous_posts_link(__( 'Previous' ));
		$next_link = get_next_posts_link(__( 'Next' ));
		
		if( !is_paged() ) : //if its the first page of events... ?>

			<?php if ($next_link) : //if there are post to paginate... ?>
			    <div class="pagination">
					<div class="page_next">
						<?php next_posts_link( 'Next' ); ?>
						<span><?php // echo file_get_contents( get_template_directory() .'/images/arrow_right.svg') ?></span>
					</div>
				</div>
			<?php endif; ?>

		<?php elseif ( $wp_query->max_num_pages == get_query_var('paged') ) : //if its the last page of events... ?>

			<div class="pagination">
				<div class="page_previous">
					<span><?php // echo file_get_contents( get_template_directory() .'/images/arrow_left.svg') ?></span>
					<?php previous_posts_link( 'Previous' ); ?>
				</div>
			</div>

		<?php else : //if its neither the first nor the last page of events... ?>

			<div class="pagination">
				<div class="page_next">
					<?php next_posts_link( 'Next' ); ?>
					<span><?php // echo file_get_contents( get_template_directory() .'/images/arrow_right.svg') ?></span>
				</div>
				<div class="page_previous">
					<span><?php // echo file_get_contents( get_template_directory() .'/images/arrow_left.svg') ?></span>
					<?php previous_posts_link( 'Previous' ); ?>
				</div>
			</div>

		<?php endif; ?>

	<?php else: ?>

		<p>There are currently no posts.</p>

	<?php endif; ?>

	
</div>

<?php get_footer(); ?>