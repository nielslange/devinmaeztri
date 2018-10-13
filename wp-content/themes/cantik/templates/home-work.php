<?php 
/**
 * Author: Niels Lange <niels@semantics-llc.com>
 * Author URI: http://www.semantics-llc.com
 * Description: Template to display the work section 
 * Version: 1.0.0
 */
?>

<div id="work" class="space">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h2><?php the_field('work_title'); ?></h2>
				<div class="separator">
					<span class="fa-stack fa-lg">
  						<i class="fa fa-circle fa-stack-2x"></i>
  						<i class="fa <?php the_field('work_icon'); ?> fa-stack-1x fa-inverse"></i>
					</span>
				</div>
			</div>
		</div>
		<?php if (have_rows('work_items')) : ?>
			<?php while (have_rows('work_items') ) : the_row(); ?>
				<div class="row">
					<div class="col-sm-4 col-sm-offset-2 text-right hidden-xs">
						<p class="lead"><?php the_sub_field('work_date'); ?></p>
					</div>
					<div class="col-sm-4 col-sm-offset-2 visible-xs">
						<p class="lead">
							<?php the_sub_field('work_date'); ?><br>
							<?php the_sub_field('work_job_title'); ?>
						</p>
					</div>
					<div class="col-sm-6">
						<p class="lead hidden-xs"><?php the_sub_field('work_job_title'); ?></p>
						<p><strong><?php the_sub_field('work_employer'); ?></strong></p>
						<p><?php the_sub_field('work_description'); ?></p>
					</div>
				</div>
				<br>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>