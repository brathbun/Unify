<div id="container" class="large-12 columns">

	<div class="row"><div class="large-5 large-centered columns"><h3>Welcome <?php echo $username ?>!</h3></div></div>
	<div class="row"><div class="large-5 large-centered columns"><h5>Please sign in below or <a href="signup">Register</a></h5></div></div>
	
	<form data-abide action="verifyLogin" method="post" accept-charset="utf-8">


		<div class="large-4 large-centered columns">
			<div class="row collapse">
				<div class="large-4 large-centered columns">
					<span class="prefix radius">Username</span>
				</div>
				<div class="large-8 large-centered columns">
					<input type="text" required name="username" placeholder="e.g. thiswillneverchange" maxlength="50">
					<small class="error">Username is required.</small>	
				</div>
			</div>
		</div>

		<div class="large-4 large-centered columns">
			<div class="row collapse">
				<div class="large-4 large-centered columns">
					<span class="prefix radius">Password</span>
				</div>
				<div class="large-8 large-centered columns">
					<input type="password" required name="password" pattern="[a-zA-Z0-9]+" placeholder="...security FTW!" maxlength="50">
					<small class="error">Password is required.</small>
				</div>
			</div>
		</div>

		<div class="row"><div class="large-3 large-centered columns">
			<button type="submit">Enter the Dragon!</button>
		</div></div>		

	</form>

</div>