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

	if(isset($_POST['submit6'])){
		$stmt2 = $db->prepare('SELECT id FROM products WHERE id = :id');
		$stmt2->execute(array(':id' => $_POST['id']));
		$row4 = $stmt2->fetch(PDO::FETCH_ASSOC);

		
		if(empty($row4['id'])){
			echo 'Product provided is not recognised.';
		}
		else {
			$stmt3 = $db->prepare('UPDATE products SET name = :name, description = :description, shortDesc = :shortDesc, price = :price, pictureName = :pictureName, timeRequired = :timeRequired, polyMapCode = :polyMapCode WHERE id = :id');
			$stmt3->execute(array(
				':id' => $_POST['id'],
				':name' => $_POST['name'],
				':description' => $_POST['description'],
				':shortDesc' => $_POST['shortDesc'],
				':price' => $_POST['price'],
				':pictureName' => $_POST['pictureName'],
				':timeRequired' => $_POST['timeRequired'],
				':polyMapCode' => $_POST['polyMapCode']
			));

			echo 'Product Number: '.$_POST['id'].' has been updated.';
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