<?php
/**
 * Author: Niels Lange <niels@semantics-llc.com>
 * Author URI: http://www.semantics-llc.com
 * Description: Template to display the maps section 
 * Version: 1.0.0
 */
?>

<div id="maps" class="space space-no-bottom">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h2><?php the_field('maps_title'); ?></h2>
				<div class="separator">
					<span class="fa-stack fa-lg">
  						<i class="fa fa-circle fa-stack-2x"></i>
  						<i class="fa <?php the_field('maps_icon'); ?> fa-stack-1x fa-inverse"></i>
					</span>
				</div>
			</div>
		</div>
	</div>
	<?php if( have_rows('maps_items') ): ?>
		<div class="acf-map">
			<?php while ( have_rows('maps_items') ) : the_row(); 
	
				$location = get_sub_field('maps_item');
	
				?>
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
					<h4><?php //the_sub_field('title'); ?></h4>
					<p class="address"><?php echo $location['address']; ?></p>
					<p><?php //the_sub_field('description'); ?></p>
				</div>
		<?php endwhile; ?>
		</div>
	<?php endif; ?>
</div>
