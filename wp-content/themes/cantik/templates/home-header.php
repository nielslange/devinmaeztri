<?php 
/**
 * Author: Niels Lange <niels@semantics-llc.com>
 * Author URI: http://www.semantics-llc.com
 * Description: Template to display the header section 
 * Version: 1.0.0
 */
$home = get_page_by_title('Homepage');
?>
<div id="header" style="background: #ef6b69;">
	<div class="container">
		<div class="row">
			<div id="header-image" class="col-sm-6">
				<img alt="Devin Maeztri" src="<?php the_field('header_image', $home->ID); ?>" class="img-responsive" style="width: 100%;">
			</div>
			<div id="header-text"  class="col-sm-6">
				<?php the_field('header_title', $home->ID); ?>
			</div>
		</div>
	</div>
</div>