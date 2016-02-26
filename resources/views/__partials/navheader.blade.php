<!-- NAV MODAL __partials.navheader -->
<header id="header" class="alt">
	<h1><a href="{{ route('home') }}" class="logoImg"><img src="{{ URL::asset('assets/images/logo2.png') }}"></a></h1>
	<nav>
		<a href="{{ route('home') }}" class="button">Home</a>
		<a href="{{ route('projectsIndex') }}" class="button">Projects</a>
		<a href="{{ route('videosIndex') }}" class="button">Videos</a>
		<a href="#contact" class="button">Contact</a>
		<a href="#menu" class="button"><i class="fa fa-bars"></i> Menu</a>
		<a href='#login' class='button' style='margin: 0 1em 0 0'>Log In</a>
		<a href='#signup' class='button'>Sign Up</a>

		<!-- If isset error: <a href='#error' class='error button' style='margin: 0 1em 0 0'>Error</a> -->
		<!-- If user is logged in:  "<a href='#cart' class='button' style='margin: 0 1em 0 0'>Cart</a>"
			"<a href='userPage.php' class='button' style='margin: 0 1em 0 0'>".\SESSION[ \'username'\ ]."</a>"
			"<a href='logout.php' class='button'>Log Out</a>"
		-->
		<!-- Else: <a href='#login' class='button' style='margin: 0 1em 0 0'>Log In</a> <a href='#signup' class='button'>Sign Up</a> -->

	</nav>
</header>
<!-- END NAV MODAL __partials.navheader -->