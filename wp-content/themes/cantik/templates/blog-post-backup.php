<?php 
/**
 * Author: Niels Lange <niels@semantics-llc.com>
 * Author URI: http://www.semantics-llc.com
 * Description: Template to display the a single post
 * Version: 1.0.0
 */
?>
<div id="post" class="space">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<?php if (  have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<h2 class="text-center"><?php the_title(); ?></h2>
						<hr>
						<!--  
						<div class="alert alert-info" role="alert">
							<p>
								<i class="fa fa-fw fa-user"></i> <?php the_author(); ?> &nbsp;
								<i class="fa fa-fw fa-clock-o"></i> <?php echo get_the_date(); ?> &nbsp;
								<?php if ( comments_open() ) : ?>
									<?php comments_number( '<i class="fa fa-fw fa-comment-o"></i> No comments', '<i class="fa fa-fw fa-comment"></i> One comment', '<i class="fa fa-fw fa-comments"></i>  % comments' ); ?> &nbsp; 
								<?php endif; ?>
								<i class="fa fa-fw fa-list-ul"></i> <?php echo get_the_category_list(', '); ?> &nbsp;
								<?php if ( has_tag() ) : ?>
									<i class="fa fa-fw fa-tag"></i> <?php the_tags('', ', '); ?> &nbsp;
								<?php endif; ?>
							</p>
						</div>
						-->
						<?php the_content(); ?>
						<hr>
						<?php comment_form(); ?>
						<ol class="commentlist">
							<?php wp_list_comments(); ?>
						</ol>
					<?php endwhile; ?>				
				<?php endif; ?>
				<h2></h2>
			</div>
		</div>
	</div>
</div>