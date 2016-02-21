<?php
require('includes/config.php');

if(isset($_POST['submit2'])){

	if(strlen($_POST['username2']) < 3){
		$error[] = 'Username is too short.';
	} else {
		$stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $_POST['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username2'])){
			$error[] = 'Username provided is already in use.';
		}

	}

	if(strlen($_POST['password2']) < 3){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['passwordConfirm2']) < 3){
		$error[] = 'Confirm password is too short.';
	}

	if($_POST['password2'] != $_POST['passwordConfirm2']){
		$error[] = 'Passwords do not match.';
	}

	if(!filter_var($_POST['email2'], FILTER_VALIDATE_EMAIL)){
		$error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Email provided is already in use.';
		}

	}


	if(!isset($error)){

		$hashedpassword = $user->password_hash($_POST['password2'], PASSWORD_BCRYPT);

		//$activation = md5(uniqid(rand(),true));

		try {

			$stmt = $db->prepare("INSERT INTO members (username,password,email,active) VALUES (:username, :password, :email, :active)");
			$stmt->execute(array(
				':username' => $_POST['username2'],
				':password' => $hashedpassword,
				':email' => $_POST['email2'],
				':active' => 'Yes'
				));

			header('Location: index.php?action=active');
			exit;

		} catch(PDOException $e) {
			$error[] = $e->getMessage();
		}

	}

}

if(isset($_POST['submit13'])){
	//array_push($_SESSION['cart'], $_POST['item']);
	$temp[] = array('id' => (int)$_POST['item'], 'quantity' => (int)$_POST['quantity']);//$_POST['item'];
	array_push($_SESSION['cart'], $temp);
	//header('Location: ' . $_SERVER['HTTP_REFERER']);
	//header('Location: '.basename($_SERVER['PHP_SELF']));
	//print_r($_SESSION['cart']);
	//unset($_SESSION['cart']);
	var_dump($_SESSION['cart']);
}


if(isset($_POST['submit1'])){

	$username = $_POST['username1'];
	$password = $_POST['password1'];
	
	if($user->login($username,$password)){ 
		$_SESSION['username1'] = $username;
		$_SESSION['cart'] = array();
		header('Location: '.basename($_SERVER['PHP_SELF']));
		exit;

	} else {
		$error[] = 'Wrong username or password.';
	}
}

$pageTitle = 'GUBotDev';
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>GUBotDev</title>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="images/icon.ico" type="image/x-icon" >
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>
	<div id="page-wrapper">

		<!-- header -->
		<header id="header" class="alt">
			<h1><a href="index.php" class="logoImg"><img src="images/logo2.png"></a></h1>
			<nav>
				<a href="index.php" class="button">Home</a>
				<a href="projects.php" class="button">Projects</a>
				<a href="videos.php" class="button">Videos</a>
				<a href="#contact" class="button">Contact</a>
				<a href="#menu" class="button"><i class="fa fa-bars"></i> Menu</a>
				<?php

				if(isset($error)){
					echo "<a href='#error' class='error button' style='margin: 0 1em 0 0'>Error</a>";
				}

				if( $user->is_logged_in() ){
					echo "<a href='#cart' class='button' style='margin: 0 1em 0 0'>Cart</a>";
					echo "<a href='userPage.php' class='button' style='margin: 0 1em 0 0'>".$_SESSION['username']."</a>";
					echo "<a href='logout.php' class='button'>Log Out</a>";
				}
				else{
					echo "<a href='#login' class='button' style='margin: 0 1em 0 0'>Log In</a>";
					echo "<a href='#signup' class='button'>Sign Up</a>";
				}
				?>
			</nav>
		</header>

		<!-- login -->
		<nav id="login">
			<div class="inner" style="width: 24.75em">
				<form role="form" method="post" action="" autocomplete="off">
					<h2>Log In</h2>
					<?php
					if(isset($_GET['action'])){

					//check the action
						switch ($_GET['action']) {
							case 'active':
							echo "<h2>Your account is now active you may now log in.</h2>";
							break;
							case 'reset':
							echo "<h2>Please check your inbox for a reset link.</h2>";
							break;
							case 'resetAccount':
							echo "<h2>Password changed, you may now login.</h2>";
							break;
						}

					}
					?>

					<input type="text" name="username1" id="username" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1" style="margin-bottom: 1em">

					<input type="password" name="password1" id="password" placeholder="Password" tabindex="3" style="margin-bottom: 1em">
					<p>
						<input type="submit" name="submit1" value="Log In" class="button fit" tabindex="5" >
						<a href='reset.php' class='button fit'>Forgot Password?</a>
					</p>
				</form>
				<p>
					<a href="#" class="close">Close</a>
				</p>
			</div>
		</nav>

		<!-- signup -->
		<nav id="signup">
			<div class="inner"  style="width: 24.75em">
				<form role="form" method="post" action="" autocomplete="off">
					<h2>Sign Up</h2>
					<?php
					//if action is joined show sucess
					if(isset($_GET['action']) && $_GET['action'] == 'joined'){
						echo "<h2>Registration successful, please check your email to activate your account.</h2>";
					}
					?>

					<input type="text" name="username2" id="username" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1" style="margin-bottom: 1em">
					<input type="email" name="email2" id="email" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2" style="margin-bottom: 1em">
					<input type="password" name="password2" id="password" placeholder="Password" tabindex="3" style="margin-bottom: 1em">
					<input type="password" name="passwordConfirm2" id="passwordConfirm" placeholder="Confirm Password" tabindex="4" style="margin-bottom: 1em">
					<p>
						<input type="submit" name="submit2" value="Sign Up" class="button fit" tabindex="5" style="margin-bottom: 1em">
					</p>
				</form>
				<p>
					<a href="#" class="close">Close</a>
				</p>
			</div>
		</div>
	</nav>

	<!-- error -->
	<nav id="error">
		<div class="inner"  style="width: 24.75em">

			<?php
				$errors = "";
				//check for any errors
			if(isset($error)){
				foreach($error as $error){
					$errors.= "<p style='font-size: 5'>".$error."</p>";
				}

				echo $errors;
			}
			?>

			<a href="#" class="close">Close</a>
		</div>
	</div>
</nav>


<!-- contact -->
<nav id="contact">
	<div class="inner" style="width: 40em">
		<h2>Get in touch!</h2>
		<h1><i class="icon fa-phone"></i>&zwnj; Phone: <a href="tel:814-871-556">814-871-5566</a></h1>
		<h1><i class="icon fa-at"></i>&zwnj; Email: <a href="mailto:gubotdev@gmail.com">contact@gubotdev.com</a></h1>
		<h1><i class="icon fa-envelope"></i>&zwnj; Mail: 109 University Sq. Erie, PA 16510</h1>
		<a href="https://github.com/GUBotDev" class="icon fa-github"><span class="label">Github</span></a>
		<a href="https://www.facebook.com/GUBotDevelopment" class="icon fa-facebook"><span class="label">Facebook</span></a>
		<a href="https://twitter.com/gubotdev" class="icon fa-twitter"><span class="label">Twitter</span></a>
		<a href="https://www.youtube.com/channel/UCZmfiBEb2jFXskunSBqsjGA" class="icon fa-youtube"><span class="label">YouTube</span></a>
		<p></p>
		<a href="#" class="close">Close</a>
	</div>
</nav>


<!-- cart -->
<nav id="cart">
	<div class="inner" style="width: 40em">
		<?php
			echo '<h3 class="major">Items</h3>
			<div class="table-wrapper">
				<table class="default">
					<tbody>
						<tr>
							<td>Item</td>
							<td>$'.'100.00'.'</td>
							<td><a href="#" class="button">Remove</a></td>
						</tr>
						<tr>
							<td>Item</td>
							<td>$'.'100.00'.'</td>
							<td><a href="#" class="button">Remove</a></td>
						</tr>
						<tr>
							<td>Total Price:</td>
							<td>$'.'200.00'.'</td>
							<td><a href="#" class="button">Remove All</a></td>
						</tr>
					</tbody>
				</table>
			</div>
			';

			//	var_dump($_SESSION['cart']);
		?>

		<!--<form id="myContainer" method="post" action="/checkout" style=".button{width: 80%; padding: 4em, 0, 4em, 0}" class="button fit"></form>

	    <form action="" method="POST">-->
            
            <form action="" method="POST">
                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_UTLHIu78EJyfJkOfEqr9gVPz"
                    data-amount="2000"
                    data-name="Demo Site"
                    data-description="2 widgets ($90.00)"
                    data-image="/128x128.png"
                    data-locale="auto">
                </script>
            </form>
            
            <!-- Custom Stripe checkout -->
            <!--<script src="https://checkout.stripe.com/checkout.js"></script>

            <button id="customButton">Purchase</button>

            <script>
                var handler = StripeCheckout.configure({
                    key: 'pk_test_UTLHIu78EJyfJkOfEqr9gVPz',
                    image: '/img/documentation/checkout/marketplace.png',
                    locale: 'auto',
                    token: function(token) {
                    // Use the token to create the charge with a server-side script.
                    // You can access the token ID with `token.id`
                    }
                });

                $('#customButton').on('click', function(e) {
                    // Open Checkout with further options
                    handler.open({
                        name: 'Demo Site',
                        description: '2 widgets',
                        amount: 2000
                    });
                    e.preventDefault();
                });

                // Close Checkout on page navigation
                $(window).on('popstate', function() {
                    handler.close();
                });
            </script>
            -->
            
	    <!--<script src="//www.paypalobjects.com/api/checkout.js" async></script>

		<form role="form" method="post" action="" autocomplete="off">
			<h3 class="major">Buy Now</h3>
			<input type="submit" name="submit2" value="Pay With PayPal" class="button fit" tabindex="5" style="margin-bottom: 1em">
		</form>
		<form role="form" method="post" action="" autocomplete="off">
			<input type="submit" name="submit2" value="Pay With CoinBase" class="button fit" tabindex="5" style="margin-bottom: 1em">
		</form>
		<p></p>
		<a href="#" class="close">Close</a>
	</div>
</nav>
-->
<!-- menu -->
<nav id="menu">
	<div class="inner"  style="width: 24.75em">
		<div id="mainMenu" style="display: block">
			<a href="index.php" class="button" style="width: 40%; margin-bottom: 1em">Home</a>
			<a href="projects.php" class="button" style="width: 40%; margin-bottom: 1em">Projects</a>
			<a href="videos.php" class="button" style="width: 40%; margin-bottom: 1em">Videos</a>
			<a href="javascript:toggleVisibility('contactHide')" class="button" style="width: 40%; margin-bottom: 1em">Contact</a>
			<?php

			if( $user->is_logged_in() ){
				echo "<a href='#cart' class='button' style='width: 40%; margin-bottom: 1em; margin-right: 1em'>Cart</a>";
				echo "<a href='userPage.php' class='button' style='width: 40%; margin-bottom: 1em;'>".$_SESSION['username']."</a>";
				echo "<a href='logout.php' class='button' style='width: 83%; margin-bottom: 1em'>Log Out</a>";
			}
			else{
				echo "<a href='javascript:toggleVisibility(".'"loginHide"'.")' class='button' style='width: 40%; margin-bottom: 1em'>Log In</a>";
				echo "<a href='javascript:toggleVisibility(".'"signUpHide"'.")' class='button' style='width: 83%; margin-bottom: 1em'>Sign Up</a>";
			}

			if(isset($error)){
				echo "<a href='javascript:toggleVisibility(".'"errorsHide"'.")' class='error button' style='margin-bottom: 1em; width: 83%'>Error</a>";
			}
			?>
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
				<?php
				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
						echo "<h2>Your account is now active you may now log in.</h2>";
						break;
						case 'reset':
						echo "<h2>Please check your inbox for a reset link.</h2>";
						break;
						case 'resetAccount':
						echo "<h2>Password changed, you may now login.</h2>";
						break;
					}
				}
				?>

				<input type="text" name="username1" id="username" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1" style="margin-bottom: 1em">

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
				<?php
					//if action is joined show sucess
				if(isset($_GET['action']) && $_GET['action'] == 'joined'){
					echo "<h2>Registration successful, please check your email to activate your account.</h2>";
				}
				?>

				<input type="text" name="username2" id="username" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1" style="margin-bottom: 1em">
				<input type="email" name="email2" id="email" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2" style="margin-bottom: 1em">
				<input type="password" name="password2" id="password" placeholder="Password" tabindex="3" style="margin-bottom: 1em">
				<input type="password" name="passwordConfirm2" id="passwordConfirm" placeholder="Confirm Password" tabindex="4" style="margin-bottom: 1em">
				<p>
					<input type="submit" name="submit2" value="Sign Up" class="button fit" tabindex="5" style="margin-bottom: 1em">
				</p>
			</form>
		<a href="javascript:toggleVisibility('mainMenuBlock')" class="button fit">Back to Menu</a>
		</div>


		<div id="errorsHide" style="display: none; ">
			<?php
			if(isset($error)){
				echo $errors;
			}
			?>
		<a href="javascript:toggleVisibility('mainMenuBlock')" class="button fit">Back to Menu</a>
		</div>

		<a href="#" class="close">Close</a>
	</div>
</div>
</nav>