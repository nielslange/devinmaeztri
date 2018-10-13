<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 hidden-xs">
				<p class="text-muted text-center">
					&copy; <?php echo date('Y'); ?> Devin Maeztri | All rights reserved | 
					Developed with <abbr title="Niels Lange | December 5th 2015"><i class="fa fa-heart"></i></abbr> on Bali by <a href="https://nielslange.com" target="_blank" title="Niels Lange | WordPress Developer"><strong>Niels Lange</strong></a>
				</p>
			</div>
			<div class="col-xs-10 visible-xs">
				<p class="text-muted">
					&copy; <?php echo date('Y'); ?> Devin Maeztri | All rights reserved | 
					Developed with <abbr title="Niels Lange | December 5th 2015"><i class="fa fa-heart"></i></abbr> on Bali by <a href="https://nielslange.com" target="_blank" title="Niels Lange | WordPress Developer"><strong>Niels Lange</strong></a>
				</p>
			</div>
		</div>
	</div>
</footer>

<a href="#" class="scrollup"> <i class="fa fa-lg fa-chevron-up"></i></a>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Drop me a line!</h4>
			</div>
			<div class="modal-body">
			    <?php echo do_shortcode('[contact-form-7 id="130" title="Popup"]'); ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
	setTimeout(function(){
	   if ( !Cookies.get('contact_request') ) {
		   $('#myModal').modal('show');
    	   Cookies.set('contact_request', true, { expires: 1 });
	   }
    }, 120000);
});
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75355127-1', 'auto');
  ga('send', 'pageview');
</script>

<?php wp_footer(); ?>

</body>
</html>