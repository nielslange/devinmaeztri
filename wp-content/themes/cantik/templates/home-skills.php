<?php 
/**
 * Author: Niels Lange <niels@semantics-llc.com>
 * Author URI: http://www.semantics-llc.com
 * Description: Template to display the skills section 
 * Version: 1.0.0
 */

$skills		 = get_field('skills_items');
$count 		 = count($skills);
$start_left  = 0; 
$end_left 	 = ceil($count/2) - 1;
$start_right = $end_left + 1; 
$end_right   = $count - 1;

?>
<div id="skills" class="space">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h2><?php the_field('skills_title'); ?></h2>
				<div class="separator">
					<span class="fa-stack fa-lg">
  						<i class="fa fa-circle fa-stack-2x"></i>
  						<i class="fa <?php the_field('skills_icon'); ?> fa-stack-1x fa-inverse"></i>
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-5 col-sm-offset-1">
				<?php for ($i = $start_left; $i <= $end_left; $i++) : ?>
					<div class="progress">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $skills[$i]['skills_procentage']; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $skills[$i]['skills_procentage']; ?>%">
							<?php echo $skills[$i]['skills_item']; ?>
						</div>
					</div>
				<?php endfor; ?>
			</div>
			<div class="col-sm-5">
				<?php for ($i = $start_right; $i <= $end_right; $i++) : ?>
					<div class="progress">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $skills[$i]['skills_procentage']; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $skills[$i]['skills_procentage']; ?>%">
							<?php echo $skills[$i]['skills_item']; ?>
						</div>
					</div>
				<?php endfor; ?>
			</div>
		</div>
	</div>
</div>