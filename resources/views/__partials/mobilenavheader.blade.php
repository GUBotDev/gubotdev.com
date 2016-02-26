<!-- menu -->
<nav id="menu">
	<div class="inner"  style="width: 24.75em">
		<div id="mainMenu" style="display: block">
			<a href="index.php" class="button" style="width: 40%; margin-bottom: 1em">Home</a>
			<a href="projects.php" class="button" style="width: 40%; margin-bottom: 1em">Projects</a>
			<a href="videos.php" class="button" style="width: 40%; margin-bottom: 1em">Videos</a>
			<a href="javascript:toggleVisibility('contactHide')" class="button" style="width: 40%; margin-bottom: 1em">Contact</a>
		</div>

		<div id="contactHide" style="display: none; ">
			<h2>Get in touch!</h2>
			<h1><i class="icon fa-phone"></i>&zwnj; Phone: <a href="tel:814-871-556">814-871-5566</a></h1>
			<h1><i class="icon fa-at"></i>&zwnj; Email: <a href="mailto:gubotdev@gmail.com">contact@gubotdev.com</a></h1>
			<h1><i class="icon fa-envelope"></i>&zwnj; Mail: 109 University Sq. Erie, PA 16510</h1>
			<a href="https://github.com/GUBotDev" class="icon fa-github"><span class="label">Github</span></a>
			<a href="https://www.facebook.com/GUBotDevelopment" class="icon fa-facebook"><span class="label">Facebook</span></a>
			<a href="https://twitter.com/gubotdev" class="icon fa-twitter"><span class="label">Twitter</span></a>
			<a href="https://www.youtube.com/channel/UCZmfiBEb2jFXskunSBqsjGA" class="icon fa-youtube"><span class="label">YouTube</span></a>
			<p></p>
			<a href="javascript:toggleVisibility('mainMenuBlock')" class="button fit">Back to Menu</a>
		</div>

		<div id="loginHide" style="display: none;">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>Log In</h2>

				<input type="text" name="username1" id="username" placeholder="User Name" tabindex="1" style="margin-bottom: 1em">

				<input type="password" name="password1" id="password" placeholder="Password" tabindex="3" style="margin-bottom: 1em">
				<p>
					<input type="submit" name="submit1" value="Log In" class="button fit" tabindex="5" >
					<a href='reset.php' class='button fit'>Forgot Password?</a>
				</p>
			</form>
			<a href="javascript:toggleVisibility('mainMenuBlock')" class="button fit">Back to Menu</a>
		</div>

		<div id="signUpHide" style="display: none;">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>Sign Up</h2>

				<input type="text" name="username2" id="username" placeholder="User Name" tabindex="1" style="margin-bottom: 1em">
				<input type="email" name="email2" id="email" placeholder="Email Address" tabindex="2" style="margin-bottom: 1em">
				<input type="password" name="password2" id="password" placeholder="Password" tabindex="3" style="margin-bottom: 1em">
				<input type="password" name="passwordConfirm2" id="passwordConfirm" placeholder="Confirm Password" tabindex="4" style="margin-bottom: 1em">
				<p>
					<input type="submit" name="submit2" value="Sign Up" class="button fit" tabindex="5" style="margin-bottom: 1em">
				</p>
			</form>
			<a href="javascript:toggleVisibility('mainMenuBlock')" class="button fit">Back to Menu</a>
		</div>


		<div id="errorsHide" style="display: none; ">
			<a href="javascript:toggleVisibility('mainMenuBlock')" class="button fit">Back to Menu</a>
		</div>

		<a href="#" class="close">Close</a>
	</div>
</nav>