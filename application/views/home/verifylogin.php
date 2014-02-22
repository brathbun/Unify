<div id="container" class="large-12 columns">

	<div class="row"><div class="large-6 large-centered columns"><h2>Sign In</h2></div></div>
	
	<form action="verifyLogin" method="post" accept-charset="utf-8">

		<div class="row">	
			<div class="large-6 large-centered columns">
				<div class="row collapse">
					<div class="small-9 large-centered columns">
						<?php echo form_input($username_field); ?>
					</div>
					<div class="small-3 large-centered columns">
						<span class="postfix radius">Username</span>
					</div>
				</div>
			</div>
		</div>

		<div class="row">	
			<div class="large-6 large-centered columns">
				<div class="row collapse">
					<div class="small-9 large-centered columns">
						<?php echo form_input($password_field); ?>
					</div>
					<div class="small-3 large-centered columns">
						<span class="postfix radius">Password</span>
					</div>
				</div>
			</div>
		</div>

		<div data-alert class="small-6 small-centered columns alert-box warning round">
			<?php echo validation_errors(); ?><a href="#" class="close">&times;</a>
		</div>		

		<div class="row">	
			<div class="large-6 large-centered columns">
				<?php echo form_submit('submit','Enter the Dragon'); ?>
			</div>
		</div>

	</form>

</div>