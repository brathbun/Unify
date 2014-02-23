<div id="container" class="large-12 columns">

	<div class="row"><div class="large-7 large-centered columns"><h3>Hey <?php echo $username ?>, don't just stand there!</h3></div></div>
	<div class="row"><div class="large-7 large-centered columns"><h5>Sign up for an account below or if you already have one <a href="login">Log In</a>.</h5></div></div>

	<form data-abide action="registerUser" method="post" accept-charset="utf-8">

		<div class="large-5 large-centered columns">
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

		<div class="large-5 large-centered columns">
			<div class="row collapse">
				<div class="large-4 large-centered columns">
					<span class="prefix radius">Password</span>
				</div>
				<div class="large-8 large-centered columns">
					<input type="password" id="password" required name="password" pattern="[a-zA-Z0-9]+" placeholder="...security FTW!" maxlength="80">
					<small class="error">Password is required.</small>
				</div>
			</div>
		</div>

		<div class="large-5 large-centered columns">
			<div class="row collapse">
				<div class="large-4 large-centered columns">
					<span class="prefix radius">Confirm Password</span>
				</div>
				<div class="large-8 large-centered columns">
					<input type="password" required pattern="[a-zA-Z0-9]+" data-equalto="password" placeholder="...one more time champ!" maxlength="80">
					<small class="error">Passwords must match!</small>
				</div>
			</div>
		</div>			

		<div class="large-5 large-centered columns">
			<div class="row collapse">
				<div class="large-4 large-centered columns">
					<span class="prefix radius">Gamer Handle</span>
				</div>
				<div class="large-8 large-centered columns">
					<input type="text" required name="gamerhandle" placeholder="e.g. icanchangewheenver">
					<small class="error">A gamer handle is required.</small>	
				</div>
			</div>
		</div>

		<div class="row"><div class="large-3 large-centered columns">
			<button type="submit">Enter the Dragon!</button>
		</div></div>

	</form>

</div>