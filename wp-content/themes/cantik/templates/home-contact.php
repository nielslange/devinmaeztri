<?php 
/**
 * Author: Niels Lange <niels@semantics-llc.com>
 * Author URI: http://www.semantics-llc.com
 * Description: Template to display the contact section 
 * Version: 1.0.0
 */
?>
<div id="contact" class="space">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h2><?php the_field('contact_title'); ?></h2>
				<div class="separator">
					<span class="fa-stack fa-lg">
  						<i class="fa fa-circle fa-stack-2x"></i>
  						<i class="fa <?php the_field('contact_icon'); ?> fa-stack-1x fa-inverse"></i>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>