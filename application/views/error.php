<div id="container" class="large-12 columns">
	<div class="row">
		<div class="large-8 large-centered columns">
			<h3>Hey <?php echo $username ?>!  Something went wrong.  Return <a href="/">home</a>.</h3>
		</div>
	</div>
	<div data-alert class="large-4 large-centered columns alert-box warning round">
		<?php echo validation_errors(); ?><a href="#" class="close">&times;</a>
	</div>	
</div>