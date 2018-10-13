<?php 
/**
 * Author: Niels Lange <niels@semantics-llc.com>
 * Author URI: http://www.semantics-llc.com
 * Description: Template to display the blog section 
 * Version: 1.0.0
 */
?>
<div id="archive" class="space">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="row">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-sm-5 hidden-xs">
							<a class="info" href="<?php echo get_permalink(get_the_ID()); ?>">
								<div class="hovereffect">
									<?php if ( $src = get_the_post_thumbnail_url(get_the_ID(), 'blog') ) : ?>
										<img src="<?php echo $src; ?>" alt="" class="img-responsive img-rounded">
									<?php else: ?>
										<img src="https://devinmaeztri.com/wp-content/uploads/photo-1429051781835-9f2c0a9df6e4-768x512.jpg" alt="" class="img-responsive img-rounded">
									<?php endif; ?>
									<div class="overlay">
					    	            <h2><?php echo get_the_title(); ?></h2>
			            			</div>
			    				</div>
		    				</a>
							<div style="clear:both;"></div>
						</div>
						<div class="col-sm-7">
							<h3><a href="<?php echo get_permalink(get_the_ID()); ?>" class="text-danger"><?php echo get_the_title(); ?></a></h3>
							<p><?php the_excerpt(); ?></p>
							<p><a class="hidden-xs text-danger" href="<?php echo get_permalink(get_the_ID()); ?>">Baca lebih lanjut</a></p>
							<p><a class="visible-xs btn btn-danger btn-block" href="<?php echo get_permalink($recent_post['ID']); ?>">Baca lebih lanjut</a></p>
						</div>
						<div style="clear: both;"><br></div>
					<?php endwhile; ?>
				</div>
				<?php echo pagination(); ?>
			</div>
			<div class="col-sm-4">
				<?php if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
					<div><?php dynamic_sidebar( 'sidebar-blog' ); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>