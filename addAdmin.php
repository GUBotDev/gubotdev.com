<?php
require('layout/header.php');

$stmt1 = $db->prepare('SELECT isAdmin FROM members WHERE username = :username');
$stmt1->execute(array(':username' => $_SESSION['username']));
$userData = $stmt1->fetch(PDO::FETCH_ASSOC);

if ($userData['isAdmin'] == 1) {

	echo '
	<!-- Banner -->
	<section id="banner" style="padding: 0 0 0 0;">
		<div class="inner" ></div>
	</section>

	<div class="wrapper" style="padding: 2em 0 0 0;"><p></p>

		<section id="four" class="wrapper alt style1">
			<div class="inner">
			<center>';
	
	if(isset($_POST['submit5'])){
		$stmt2 = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt2->execute(array(':username' => $_POST['username']));
		$row = $stmt2->fetch(PDO::FETCH_ASSOC);

		if(empty($row['username'])){
			echo 'Username provided is not recognised.';
		}
		else {
			$stmt3 = $db->prepare("UPDATE members SET isAdmin = :isAdmin WHERE username = :username");
			$stmt3->execute(array(
				':isAdmin' => 1,
				':username' => $_POST['username']
			));

			echo $_POST['username'].' has been opped.';
		}
		
		
	}
	else {
		echo 'Information invalid.';
	}
	
	
	echo '
	</center>
	<p></p>
	<p></p>

				<center><a href="userPage.php" class="button">Back to Admin Page</a></center>
	<p></p>
	<p></p>
			</div>
		</section>
	</div>
	';

	require('layout/footer.php');
}
else{
	header('Location: index.php');
}

?>