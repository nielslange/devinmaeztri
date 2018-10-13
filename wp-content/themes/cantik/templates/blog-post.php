<?php 
/**
 * Author: Niels Lange <niels@semantics-llc.com>
 * Author URI: http://www.semantics-llc.com
 * Description: Template to display the a single post
 * Version: 1.0.0
 */
?>
<div id="single" class="space">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="text-center"><?php the_title(); ?></h2>
				<hr>
				<?php get_template_part( 'templates/blog', 'meta' );?>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<?php if (  have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
						<hr>
					<?php endwhile; ?>
					
					<?php 
						the_post_navigation( array(
				            'prev_text'				=> __( '<i class="fa fa-fw fa-caret-left" aria-hidden="true"></i> Previous article: %title' ),
				            'next_text'          	=> __( 'Next article: %title <i class="fa fa-fw fa-caret-right" aria-hidden="true"></i>' ),
				            'screen_reader_text' 	=> __( 'Continue Reading' ),
	        			) );
						?>
	
					<?php while ( have_posts() ) : the_post(); ?>
						<div style="clear: both;"></div>
						<hr>
						<?php wp_list_comments(); ?>
						<?php comments_template(); ?>
						<?php the_comments_navigation(); ?>
						<hr>
					<?php endwhile; ?>
					
				<?php endif; ?>
			</div>
			<div class="col-sm-4">
				<?php if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
					<div><?php dynamic_sidebar( 'sidebar-blog' ); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>