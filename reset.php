<?php 

//include header template
require('layout/header.php');

//if form has been submitted process it
if(isset($_POST['submit3'])){

	//email validation
	if(!filter_var($_POST['email3'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email3']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if(empty($row['email'])){
			$error[] = 'Email provided is not recognised.';
		}

	}

	//if no errors have been created carry on
	if(!isset($error)){

		//create the activation code
		$token = md5(uniqid(rand(),true));

		try {

			$stmt = $db->prepare("UPDATE members SET resetToken = :token, resetComplete='No' WHERE email = :email");
			$stmt->execute(array(
				':email' => $row['email'],
				':token' => $token
			));

			//send email
			$to = $row['email'];
			$subject = "Password Reset";
			$body = "<p>Someone requested that the password be reset.</p>
			<p>If this was a mistake, just ignore this email and nothing will happen.</p>
			<p>To reset your password, visit the following address: <a href='".DIR."resetPassword.php?key=$token'>".DIR."resetPassword.php?key=$token</a></p>";

			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			//redirect to index page
			header('Location: reset.php?action=reset');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

?>

<!-- Banner -->
<section id="banner" style="padding: 0 0 0 0;">
	<div class="inner" ></div>
</section>

<div class="wrapper" style="padding: 2em 0 0 0;">
	<div class="inner">
		<form role="form" method="post" action="" autocomplete="off">
				<h2>Reset Password</h2>

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p>'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2>Your account is now active you may now log in.</h2>";
							break;
						case 'reset':
							echo "<h2>Please check your inbox for a reset link.</h2>";
							break;
					}

				}
				?>

				<input type="email" name="email3" id="email" placeholder="Email" value="" tabindex="1">
				<p></p>
				<input type="submit" name="submit3" value="Send Reset Link" tabindex="2">
			</form>
	</div>
</div>

<?php
//include header template
require('layout/footer.php');
?>
