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
	
	//id, name, description, shortDesc, price, pictureName, timeRequired

	if(isset($_POST['submit9'])){
		$stmt2 = $db->prepare('DELETE FROM products WHERE id = :id');
		$stmt2->execute(array(
			':id' => $_POST['id']
		));

		echo 'Item number: '.$_POST['id'].' has been removed.';
	}
	else {
		echo 'Product does not exist.';
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