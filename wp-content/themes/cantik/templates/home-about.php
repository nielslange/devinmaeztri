<?php 
/**
 * Author: Niels Lange <niels@semantics-llc.com>
 * Author URI: http://www.semantics-llc.com
 * Description: Template to display the about section 
 * Version: 1.0.0
 */
?>
<div id="about" class="space">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h2><?php the_field('about_title'); ?></h2>
				<div class="separator">
					<span class="fa-stack fa-lg">
  						<i class="fa fa-circle fa-stack-2x"></i>
  						<i class="fa <?php the_field('about_icon'); ?> fa-stack-1x fa-inverse"></i>
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 hidden-xs text-right">
				<h3>Full Name</h3>
				<p><?php the_field('about_full_name'); ?></p>
				<h3>Interests</h3>
				<p><?php the_field('about_interests'); ?></p>
				<h3>Phone</h3>
				<p><a href="tel:<?php the_field('about_phone'); ?>?call"><?php the_field('about_phone'); ?></a></p>
			</div>
			<div class="col-sm-4 col-sm-offset-1 hidden-xs">
				<p><img alt="" src="<?php the_field('about_image'); ?>" class="img-responsive img-circle"></p>
			</div>
			<div class="col-xs-8  col-xs-offset-2 visible-xs">
				<p><img alt="" src="<?php the_field('about_image'); ?>" class="img-responsive img-circle"></p>
			</div>
			<div class="col-sm-3 col-sm-offset-1 hidden-xs">
				<h3>Skype</h3>
				<p><a href="skype:<?php the_field('about_skype'); ?>?call"><?php the_field('about_skype'); ?></a></p>
				<h3>Linkedin</h3>
                <p><a href="<?php the_field('about_linkedin_url'); ?>" target="_blank"><?php the_field('about_linkedin_title'); ?></a></p>
                <h3>Email</h3>
				<p><a href="mailto:<?php the_field('about_email'); ?>" target="_blank"><?php the_field('about_email'); ?></a></p>
				<h3>Website</h3>
				<p><a href="<?php the_field('about_website'); ?>" target="_blank"><?php the_field('about_website'); ?></a></p>
			</div>
		</div>
		<br>
		<table class="table table-striped visible-xs">
			<tbody>
				<tr>
					<th class="col-xs-4">Full Name</th>
					<td><?php the_field('about_full_name'); ?></td>
				</tr>
				<tr>
					<th>Interests</th>
					<td><?php the_field('about_interests'); ?></td>
				</tr>
				<tr>
					<th>Phone</th>
					<td><a href="tel:<?php the_field('about_phone'); ?>?call"><?php the_field('about_phone'); ?></a></td>
				</tr>
				<tr>
					<th>Skype</th>
					<td><a href="skype:<?php the_field('about_skype'); ?>?call"><?php the_field('about_skype'); ?></a></td>
				</tr>
				<tr>
                    <th>Linkedin</th>
                    <td><a href="<?php the_field('about_linkedin_url'); ?>" target="_blank"><?php the_field('about_linkedin_title'); ?></a></td>
                </tr>
                <tr>
					<th>Email</th>
					<td><a href="mailto:<?php the_field('about_email'); ?>" target="_blank"><?php the_field('about_email'); ?></a></td>
				</tr>
				<tr>
					<th>Website</th>
					<td><a href="<?php the_field('about_website'); ?>" target="_blank"><?php the_field('about_website'); ?></a></td>
				</tr>
			</tbody>
		</table>
		<div class="row">
			
			<div class="col-sm-8 col-sm-offset-2 hidden-xs text-justify">
				<p class="text-center">
					<?php $file_cv = get_field('about_cv_pdf'); ?>
					<?php if ( $file_cv && get_field('about_cv_button_text') ) : ?>
                        <a href="<?php echo $file_cv['url']; ?>" class="btn btn-danger" target="_blank"><i class="fa fa-fw fa-file-pdf-o" aria-hidden="true"></i> <?php the_field('about_cv_button_text'); ?></a> &nbsp;
					<?php endif; ?>
					<?php $file_resume = get_field('about_resume_pdf'); ?>
					<?php if ( $file_resume && get_field('about_resume_button_text') ) : ?>
                        <a href="<?php echo $file_resume['url']; ?>" class="btn btn-danger" target="_blank"><i class="fa fa-fw fa-file-pdf-o" aria-hidden="true"></i> <?php the_field('about_resume_button_text'); ?></a> &nbsp;
					<?php endif; ?>
					<?php if ( get_field('about_popup_button_text') ) : ?>
	                	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-paper-plane" aria-hidden="true"></i> <?php the_field('about_popup_button_text'); ?></button>
	                <?php endif; ?>
                </p>
                <br><br>
				<?php the_field('about_description'); ?>
                <br>
				<h2 class="text-center">Letters of Recommendation</h2>
				<br>
				<p class="text-center">
					<a href="https://devinmaeztri.com/wp-content/uploads/2016/08/GIZ.pdf" class="btn btn-link" target="_blank"><i class="fa fa-fw fa-file-pdf-o" aria-hidden="true"></i> GIZ</a>
					<a href="https://devinmaeztri.com/wp-content/uploads/2016/08/University-of-Melbourne.pdf" class="btn btn-link" target="_blank"><i class="fa fa-fw fa-file-pdf-o" aria-hidden="true"></i> The University of Melbourne</a>
					<a href="https://devinmaeztri.com/wp-content/uploads/2016/08/Bogor-Agricultural-University.pdf" class="btn btn-link" target="_blank"><i class="fa fa-fw fa-file-pdf-o" aria-hidden="true"></i> Bogor Agricultural University</a>
				</p>
			</div>
			
			<div class="col-xs-12 visible-xs">
				<?php $file_cv = get_field('about_cv_pdf'); ?>
				<?php if ( $file_cv && get_field('about_cv_button_text') ) : ?>
                    <p><a href="<?php echo $file_cv['url']; ?>" class="btn btn-danger btn-block" target="_blank"><i class="fa fa-fw fa-file-pdf-o" aria-hidden="true"></i> <?php the_field('about_cv_button_text'); ?></a></p>
				<?php endif; ?>
				<?php $file_resume = get_field('about_resume_pdf'); ?>
				<?php if ( $file_resume && get_field('about_resume_button_text') ) : ?>
                    <p><a href="<?php echo $file_resume['url']; ?>" class="btn btn-danger btn-block" target="_blank"><i class="fa fa-fw fa-file-pdf-o" aria-hidden="true"></i> <?php the_field('about_resume_button_text'); ?></a></p>
				<?php endif; ?>
				<?php if ( get_field('about_popup_button_text') ) : ?>
                	<p><button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-paper-plane" aria-hidden="true"></i> <?php the_field('about_popup_button_text'); ?></button></p>
                <?php endif; ?>
                <br><br>
				<?php the_field('about_description'); ?>
				<h2 class="text-center lor">Letters of Recommendation</h2>
				<p><a href="https://devinmaeztri.com/wp-content/uploads/2016/08/GIZ.pdf" class="btn btn-link btn-block" target="_blank"><i class="fa fa-fw fa-file-pdf-o" aria-hidden="true"></i> GIZ</a></p>
				<p><a href="https://devinmaeztri.com/wp-content/uploads/2016/08/University-of-Melbourne.pdf" class="btn btn-link btn-block" target="_blank"><i class="fa fa-fw fa-file-pdf-o" aria-hidden="true"></i> The University of Melbourne</a></p>
				<p><a href="https://devinmaeztri.com/wp-content/uploads/2016/08/Bogor-Agricultural-University.pdf" class="btn btn-link btn-block" target="_blank"><i class="fa fa-fw fa-file-pdf-o" aria-hidden="true"></i> Bogor Agricultural University</a></p>
			</div>

		</div>
	</div>
</div>