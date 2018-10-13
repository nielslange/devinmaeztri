<?php 
/**
 * Author: Niels Lange <niels@semantics-llc.com>
 * Author URI: http://www.semantics-llc.com
 * Description: Template to display the a meta data
 * Version: 1.0.0
 */
?>

<?php
//debug($post);
?>

<i class="fa fa-fw fa-user" aria-hidden="true"></i> <?php echo get_the_author(); ?>
&nbsp; &nbsp; 
<i class="fa fa-fw fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?>
&nbsp; &nbsp; 
<i class="fa fa-list-ul" aria-hidden="true"></i> <?php echo get_the_category_list(', '); ?>
&nbsp; &nbsp; 
<i class="fa fa-tags" aria-hidden="true"></i> <?php echo get_the_tag_list('', ', '); ?>